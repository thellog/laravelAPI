<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
    function hello() {
        return response()->json([
            'message' => 'Hi, From Papazola with Sucks!'
        ]);
    }
}
