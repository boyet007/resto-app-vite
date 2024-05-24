<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('welcome');
// }); 

Route::get('/{any}', function () {
    return view('welcome');
})->where("any", ".*");