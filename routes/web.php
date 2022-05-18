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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/',[App\Http\Controllers\YouTubeController::class,'index'])->name('index');
Route::get('/results',[App\Http\Controllers\YouTubeController::class,'results'])->name('results');
Route::get('/watch/{id}',[App\Http\Controllers\YouTubeController::class,'watch'])->name('watch');
