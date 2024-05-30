<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;



Route::post('/auth/login', [UserController::class,'login']);
Route::post('/auth/signup', [UserController::class, 'signUp']);

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/logout', [UserController::class,'logout']);
    Route::post('/refresh', [UserController::class, 'refresh']);
    Route::post('/me', [UserController::class, 'me']);   
});

Route::group(['middleware' => 'auth:api'], function ($router) {
    Route::apiResource('restaurants', RestaurantController::class);
});

Route::get('/xdebug', function() {
    $x = 1;
    $y = 2;
    $z = 3;
    return response()->json(['result' => $x + $y + $z]);
});
