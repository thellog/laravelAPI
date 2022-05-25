<?php

namespace App\Http\Controllers;

use App\Http\Services\Web\AuthService;
use Illuminate\Support\Facades\Request;

class AuthController {

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    function checkLogin(Request $request) {
        $this->authService->checkLogin($request);
    }
}