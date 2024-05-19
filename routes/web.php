<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PekerjaanController;

Route::get('/', function () {
    return view('welcome');
});

// Route resource for pekerjaans
Route::resource('/blog', \App\Http\Controllers\BlogController::class);
Route::resource('/job', PekerjaanController::class);

// Define the specific route for the PostJob method
Route::post('/job/post-job', [PekerjaanController::class, 'PostJob'])->name('job.PostJob');
