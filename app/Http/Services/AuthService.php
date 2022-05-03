<?php
namespace App\Http\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService {
    public function login($request){
        $creds = $request->only(['email', 'password']);
        $token = auth()->attempt($creds);
        if (!$token){
            return false;
        }

        $data = json_encode([
            'token' => $token,
            'user' => Auth::user()
        ]);

        return $data;
    }

    public function register($request) {
        $encryptPass = Hash::make($request->password);
        $user = new User;

        try{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $encryptPass;
            $user->save();

            return $this->login($request);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout($request) {
        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            $data = json_encode([
                'message' => 'Logout successfully'
            ]);

            return $data;
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
}