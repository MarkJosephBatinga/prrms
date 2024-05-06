<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download_file(Request $request)
    {
        $filename = $request->input('filename');

        if (empty($filename)) {
            return redirect()->back()->with('error', 'Filename is empty');
        }

        $filePath = storage_path("app/{$filename}");

        // Check if the file exists
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        return response()->download($filePath);
    }

    public function view_file(Request $request)
    {
        $filename = $request->input('filename');

        if (empty($filename)) {
            return redirect()->back()->with('error', 'Filename is empty');
        }

        $filePath = storage_path("app/{$filename}");

        // Check if the file exists
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        return response()->file($filePath, ['content-type' => 'application/pdf'] );
    }
}
