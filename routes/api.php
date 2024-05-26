<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::get('login', [UserController::class,'login']);
    Route::post('signup', [UserController::class, 'signUp']);
    Route::post('logout', [UserController::class,'logout']);
    Route::post('me', [UserController::class, 'me']);   
    // Route::post('refresh', 'AuthController@refresh');
});

Route::get('/xdebug', function() {
    $x = 1;
    $y = 2;
    $z = 3;
    return response()->json(['result' => $x + $y + $z]);
});
