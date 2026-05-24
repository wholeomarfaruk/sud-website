<?php

namespace App\Services\Settings;

use App\Models\AppSetting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    const CACHE_KEY = 'app_settings_all';
    const CACHE_TTL = 86400; // 24 hours

    /**
     * Get a single setting value by dot-notation key.
     * e.g. setting('analytics.gtm_id')
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->all()->get($key, $default);
    }

    /**
     * Write a single setting and clear cache.
     */
    public function set(string $key, mixed $value): void
    {
        AppSetting::store($key, $value);
        $this->clearCache();
    }

    /**
     * Write multiple settings at once and clear cache once.
     * $data = ['analytics.gtm_id' => 'GTM-XXXXX', ...]
     */
    public function setMany(array $data): void
    {
        foreach ($data as $key => $value) {
            AppSetting::store($key, $value);
        }
        $this->clearCache();
    }

    /**
     * Get all settings as a flat key=>value Collection.
     * Keys are in dot-notation: "group.key"
     */
    public function all(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return AppSetting::all()
                ->mapWithKeys(fn($s) => ["{$s->group}.{$s->key}" => $s->value]);
        });
    }

    /**
     * Get all settings for a specific group.
     * Returns flat key=>value Collection with the group prefix stripped.
     */
    public function group(string $group): Collection
    {
        $prefix = $group . '.';

        return $this->all()
            ->filter(fn($v, $k) => str_starts_with($k, $prefix))
            ->mapWithKeys(fn($v, $k) => [substr($k, strlen($prefix)) => $v]);
    }

    /**
     * Clear the settings cache.
     * Call this after any manual DB change.
     */
    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Export all settings as an array (for backup/download).
     */
    public function export(): array
    {
        return $this->all()->toArray();
    }

    /**
     * Import settings from an array (from backup/upload).
     * Existing keys are overwritten.
     */
    public function import(array $data): void
    {
        foreach ($data as $dotKey => $value) {
            if (str_contains($dotKey, '.')) {
                AppSetting::store($dotKey, $value);
            }
        }
        $this->clearCache();
    }
}
