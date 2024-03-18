<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SubjectController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotpassword']);

Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});



Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});


Route::group(['middleware'=>'teacher'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);    
    Route::get('admin/admin/list', [AdminController::class, 'list']);    
    Route::get('admin/admin/add', [AdminController::class, 'add']); 
    Route::post('admin/admin/add', [AdminController::class, 'insert']); 
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']); 
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']); 
    
    // subject   
    Route::get('admin/subject/list', [SubjectController::class, 'list']);    
    Route::get('admin/subject/add', [SubjectController::class, 'add']); 
    Route::post('admin/subject/add', [SubjectController::class, 'insert']); 
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']); 
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']); 
});

Route::group(['middleware'=>'student'], function () {

    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);    
});

Route::controller(ImageController::class)->group(function(){
    Route::get('image-upload', 'index');
    Route::post('image-upload', 'store')->name('image.store');
});