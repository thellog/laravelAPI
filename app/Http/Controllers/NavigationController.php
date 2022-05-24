<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function sign_in() {
        return view('layouts.sign-in');
    }

    public function sign_up() {
        return view('layouts.sign-up');
    }
}
