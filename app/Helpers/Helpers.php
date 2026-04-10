<?php
//Helpers/Helpers.php

use App\Models\File;

use App\Services\Analytics\VisitTracker;

if (!function_exists('track_visit')) {
    function track_visit($type, $id = null, $slug = null)
    {
        app(VisitTracker::class)->track($type, $id, $slug);
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
