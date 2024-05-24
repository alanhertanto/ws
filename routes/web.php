<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\BidsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

// Route resource for blogs and jobs
Route::resource('/blog', BlogController::class);
Route::resource('/job', PekerjaanController::class);

// Define the specific route for the PostJob method
Route::post('/job/post-job', [PekerjaanController::class, 'PostJob'])->name('job.PostJob');

// Define routes for finding jobs and downloading files
Route::get('/find-job', [PekerjaanController::class, 'FindJob']);
Route::get('/download-file/{projectName}/{filename}', [PekerjaanController::class, 'downloadFile'])->name('download.file');

// Define route for bidding on a job
Route::post('/bid/bid-job', [BidsController::class, 'BidJob'])->name('bid.bidJob');

// Routes for guest users (not authenticated)
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});

// Routes for authenticated users
Route::group(['middleware' => 'auth'], function () {
    // Route for freelancer dashboard with additional middleware
    Route::get('/freelancer-dashboard', [AuthController::class, 'freelancerDashboard'])
        ->name('freelancer.dashboard')
        ->middleware('check.freelancer');
        
    // Route for logging out
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::group(['middleware' => ['auth', 'check.client']], function () {
    Route::get('/client-dashboard', [AuthController::class, 'clientDashboard'])
        ->name('client.dashboard');
});
