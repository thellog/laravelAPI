<?php

use App\Http\Controllers\api\APIController;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\MediaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Testing
Route::get('hello', [APIController::class, 'hello']);

// Make a route group for user authentication

Route::prefix('user')->group(function(){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);

    // This route requires users loggin to use
    Route::middleware(['auth'])->group(function() {
        Route::post('upload', [MediaController::class, 'upload']);
    });
});