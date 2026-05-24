<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
        'group',
        'key',
        'value',
        'type',
        'label',
        'description',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    /**
     * Fetch a single setting by dot-notation key (e.g. "analytics.gtm_id").
     */
    public static function fetch(string $dotKey, mixed $default = null): mixed
    {
        [$group, $key] = self::parseDotKey($dotKey);

        $value = static::where('group', $group)
            ->where('key', $key)
            ->value('value');

        return $value ?? $default;
    }

    /**
     * Write a single setting by dot-notation key.
     */
    public static function store(string $dotKey, mixed $value): static
    {
        [$group, $key] = self::parseDotKey($dotKey);

        return static::updateOrCreate(
            ['group' => $group, 'key' => $key],
            ['value' => $value]
        );
    }

    private static function parseDotKey(string $dotKey): array
    {
        $parts = explode('.', $dotKey, 2);

        return count($parts) === 2
            ? $parts
            : [$parts[0], ''];
    }
}
