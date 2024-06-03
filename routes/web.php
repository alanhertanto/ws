<?php

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckClient;
use App\Http\Middleware\CheckFreelancer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\BidsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Route resource for blogs and jobs
Route::resource('/blog', BlogController::class);
Route::get('/job',[PekerjaanController::class,'ClientDashboard'])->name('job.clientdashboard')->middleware(CheckClient::class);
// Define the specific route for the PostJob method
Route::get('/job/post-job', [PekerjaanController::class, 'show'])->name('job.PostJob')->middleware(CheckClient::class);
Route::post('/job/post-job', [PekerjaanController::class, 'PostJob'])->name('job.PostJob')->middleware(CheckClient::class);
Route::get('/getBidDetail/{projectId}', [PekerjaanController::class, 'GetBidDetail'])->name('getBidDetail')->middleware(CheckClient::class);
Route::post('/inviteInterview/{projectId}', [PekerjaanController::class, 'send'])->name('sendInterview')->middleware(CheckClient::class);
Route::post('/interviewTheFreelance',[PekerjaanController::class,'InterviewTheFreelance'])->name('interviewTheFreelance')->middleware(CheckClient::class);
Route::post('/chooseTheFreelance',[PekerjaanController::class,'ChooseTheFreelance'])->name('chooseTheFreelance')->middleware(CheckClient::class);
// Define routes for finding jobs and downloading files
Route::get('/find-job', [PekerjaanController::class, 'FindJob'])->middleware(CheckFreelancer::class);
Route::get('/download-file/{projectName?}/{filename?}', [PekerjaanController::class, 'downloadFile'])->name('download.file')->middleware(CheckFreelancer::class);
Route::post('/bid/bid-job', [BidsController::class, 'BidJob'])->name('bid.bidJob')->middleware(CheckFreelancer::class);

Route::get('/admin/index',[AuthController::class,'adminDashboard'])->middleware(CheckAdmin::class);
Route::get('/admin/lihat-pekerjaan',[AdminController::class,'viewJobs'])->name('lihat-pekerjaan')->middleware(CheckAdmin::class);
Route::get('/getAllJob',[AdminController::class,'getAllJob'])->name('getAllJob')->middleware(CheckAdmin::class);
Route::get('/approveProject/{projectId}', [AdminController::class, 'ApproveProject'])->name('approveProject')->middleware(CheckAdmin::class);
Route::get('/finishProject/{projectId}', [AdminController::class, 'FinishProject'])->name('finishProject')->middleware(CheckAdmin::class);
Route::get('/admin/lihat-transaksi',[AdminController::class,'viewTrans'])->name('lihat-transaksi')->middleware(CheckAdmin::class);
Route::get('/getAllTransaction', [AdminController::class,'getAllTransaction'])->name('getAllTransaction')->middleware(CheckAdmin::class);
Route::get('/admin/cetak-transaksi',[AdminController::class,'printTrans'])->name('cetak-transaksi')->middleware(CheckAdmin::class);
Route::get('/printTransaction', [AdminController::class,'printTransaction'])->name('printTransaction')->middleware(CheckAdmin::class);
Route::get('/approveTransaction/{transactionId}', [AdminController::class, 'approveTransaction'])->name('approveTransaction')->middleware(CheckAdmin::class);
Route::get('/completeTransaction/{transactionId}', [AdminController::class, 'completeTransaction'])->name('completeTransaction')->middleware(CheckAdmin::class);

// Routes for guest users (not authenticated)
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');