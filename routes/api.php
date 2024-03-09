<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\docs\APIDocController;

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
Route::fallback(function(){
    return response()->json([
        'status'    => false,
        'message'   => 'Page Not Found.',
    ], 404);
});
Route::controller(UserController::class)->group(function(){
    Route::get('create-account','create_account')->name('create.account');
    Route::get('login-account','login_account')->name('login.account');
});
Route::group(['middleware'=>'api'],function($routes){
    Route::controller(UserController::class)->group(function(){
        Route::get('dashboard','dashboard')->name('dashboard');
        Route::post('create-user','register')->name('register');
        Route::post('login','login')->name('login');
        Route::get('logout','logout')->name('logout');
    });
});
Route::controller(APIDocController::class)->group(function(){
    Route::get('docs','index')->name('api.docs');
});

