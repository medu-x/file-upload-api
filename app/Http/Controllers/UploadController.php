<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        // Validate file
        $request->validate([
            'file' => 'required|file|max:4096' // max 2MB
        ]);

        // Store file
        $path = $request->file('file')->storeAs(
            'uploads',
            time() . '_' . $request->file('file')->getClientOriginalName()
        );

        return response()->json([
            'message' => 'File uploaded successfully',
            'path' => $path
        ]);
    }
}
