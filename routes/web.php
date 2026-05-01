<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\Storage;

Route::get('/files', function () {
    return response()->json([
        'files' => Storage::files('uploads'),
    ]);
});
