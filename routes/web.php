<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//route resource for pekerjaans
Route::resource('/pekerjaans', \App\Http\Controllers\PekerjaanController::class);
Route::resource('/blog', \App\Http\Controllers\BlogController::class);
Route::resource('/job', \App\Http\Controllers\JobController::class);