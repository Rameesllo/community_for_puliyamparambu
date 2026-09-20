<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Response;

class FileController extends Controller
{
    public function show(File $file): Response
    {
        // The content is stored as a base64 encoded string in a longText column.
        $content = base64_decode($file->content);

        return response($content)->header('Content-Type', $file->mime_type);
    }
}
