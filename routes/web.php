<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Storage;



Route::get('/files', function () {
    try {
        // Make sure folder exists
        if (!Storage::exists('uploads')) {
            Storage::makeDirectory('uploads');
        }

        return response()->json([
            'files' => Storage::files('uploads'),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ], 500);
    }
});
