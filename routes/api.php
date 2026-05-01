<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;



use Illuminate\Support\Facades\Storage;
Route::post('/upload', [UploadController::class, 'store']);


Route::get('/files', function () {
    try {
        return response()->json([
            'files' => Storage::files('uploads'),
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);
    }
});
