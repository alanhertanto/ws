<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource for pekerjaans
Route::resource('/pekerjaans', \App\Http\Controllers\PekerjaanController::class);