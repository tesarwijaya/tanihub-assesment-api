<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function __invoke(Request $request)
    {
        $filename = $request->input('name');

        $exists = Storage::exists('public/products/' . $filename);

        if ($exists) {
            $image = Storage::get('public/products/' . $filename);
            
            $response = response()->make($image, 200);
            $response->header("Content-Type", 'image/png');
            return $response;
        } else {
            return response(['message' => 'image not found'], 404);
        }
    }
}
