<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Services\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    protected $mediaService;

    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function upload_image() {
        return view('layouts.upload');
    }
    
    public function upload(Request $request) {
        $res = $this->mediaService->uploadImg($request);
        if ($res == true) {
            return response()->json([
                'data' => $res
            ]);
        }
    }
}