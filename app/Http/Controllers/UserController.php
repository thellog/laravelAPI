<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    public function index(Request $request){
        return $request->user();
    }

    public function register(Request $request){
      $request->validate([
          'name'=>'required',
          'email'=>'required|email|unique:users',
          'password'=>'required|confirmed',
      ]);

      $result=User::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt($request->password),
      ]);
      return $result;
    }

    public function login(Request $request){
       $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
    if(Auth::attempt($credentials)){
          $user=Auth::user();
          $token= md5( time() ).'.'.md5($request->email);
          $user->forceFill([
              'api_token'=>$token,
          ])->save();
          return response()->json([
              'token'=>$token
          ]);
     }
       return response()->json([
           'message'=>'The provided credentials do not match out records.'
       ]);

      }
      public function logout(Request $request){
        $request->user()-> forceFill([
            'api_token'=>null,
        ])->save();
        return response()->json(['message'=>'success']);
    }

}
