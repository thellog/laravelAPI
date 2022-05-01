<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login(Request $request) {
        $res = $this->authService->login($request);

        if (!$res){
            return response()->json([
                'state' => false,
            ]);
        }

        return response()->json([
            'state' => true,
            'data' => json_decode($res)
        ]);
    }

    public function register(Request $request) {
        $res = $this->authService->register($request);

        if (!$res) {
            return response()->json([
                'state' => false,
            ]);
        }

        return response()->json([
            'state' => true,
            'data' => json_decode($res)
        ]);
    }

    public function logout(Request $request) {
        $res = $this->authService->logout($request);

        if (!$res) {
            return response()->json([
                'state' => false,
            ]);
        }

        return response()->json([
            'state' => true,
            'data' => json_decode($res)
        ]);
    }
}
