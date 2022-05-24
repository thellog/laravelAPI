<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('sign_in', [NavigationController::class, 'sign_in'])->name('sign_in');
Route::get('sign_up', [NavigationController::class, 'sign_up'])->name('sign_up');

Route::get('/',[App\Http\Controllers\YouTubeController::class,'index'])->name('index');
Route::get('/results',[App\Http\Controllers\YouTubeController::class,'results'])->name('results');
Route::get('/watch/{id}',[App\Http\Controllers\YouTubeController::class,'watch'])->name('watch');
