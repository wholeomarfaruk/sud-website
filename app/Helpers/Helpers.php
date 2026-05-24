<?php
//Helpers/Helpers.php

use App\Services\Settings\SettingsService;

use App\Models\File;

use App\Services\Analytics\VisitTracker;

if (!function_exists('track_visit')) {
    function track_visit($type, $id = null, $slug = null)
    {
        app(VisitTracker::class)->track($type, $id, $slug);
    }
}

if (!function_exists('setting')) {
    /**
     * Retrieve a setting value by dot-notation key.
     * e.g. setting('analytics.gtm_id')
     * e.g. setting('analytics.gtm_id', 'fallback')
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return app(SettingsService::class)->get($key, $default);
    }
}

if (!function_exists('settings_group')) {
    /**
     * Retrieve all settings for a group as key=>value array.
     * e.g. settings_group('analytics')
     */
    function settings_group(string $group): array
    {
        return app(SettingsService::class)->group($group)->toArray();
    }
}

if (!function_exists('file_path')) {


    function file_path($id=null, $type = 'original')
    {
        if (!$id) {
            return null;
        }
        $file = File::with('items')->find($id);

        if (!$file) {
            return null;
        }

        $item = $file->items->firstWhere('type', $type);

        return $item ? asset('storage/' . $item->path) : null;
    }
}
