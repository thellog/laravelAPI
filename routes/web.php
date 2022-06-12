<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavigationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\api\MediaController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('sign_in', [NavigationController::class, 'sign_in'])->name('sign_in');
Route::post('login', [AuthController::class, 'checkLogin'])->name('login');
Route::get('sign_up', [NavigationController::class, 'sign_up'])->name('sign_up');

Route::get('/',[YoutubeController::class,'index'])->name('index');
Route::get('/results',[YoutubeController::class,'results'])->name('results');
Route::get('/watch/{id}',[YoutubeController::class,'watch'])->name('watch');

Route::get('upload', [MediaController::class, 'upload_image'])->name('upload_image');
Route::post('upload', [MediaController::class, 'upload'])->name('upload');