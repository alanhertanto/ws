<?php

use App\Http\Middleware\CheckClient;
use App\Http\Middleware\CheckFreelancer;
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
Route::get('/job',[PekerjaanController::class,'ClientDashboard'])->name('job.clientdashboard')->middleware(CheckClient::class);
// Define the specific route for the PostJob method
Route::post('/job/post-job', [PekerjaanController::class, 'PostJob'])->name('job.PostJob')->middleware(CheckClient::class);
Route::get('/getBidDetail/{projectId}', [PekerjaanController::class, 'GetBidDetail'])->name('getBidDetail')->middleware(CheckClient::class);
Route::post('/inviteInterview/{projectId}', [PekerjaanController::class, 'send'])->name('sendInterview')->middleware(CheckClient::class);
// Define routes for finding jobs and downloading files
Route::get('/find-job', [PekerjaanController::class, 'FindJob'])->middleware(CheckFreelancer::class);
Route::get('/download-file/{projectName?}/{filename?}', [PekerjaanController::class, 'downloadFile'])->name('download.file')->middleware(CheckFreelancer::class);
Route::post('/bid/bid-job', [BidsController::class, 'BidJob'])->name('bid.bidJob')->middleware(CheckFreelancer::class);



// Routes for guest users (not authenticated)
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');