<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\ChatController;
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

Route::group(['middleware'=>'common'], function () {
    Route::get('chat', [ChatController::class, 'chat']);  
    Route::post('submit_message', [ChatController::class, 'submit_message']);  
    Route::post('get_chat_windows', [ChatController::class, 'get_chat_windows']);
    Route::post('get_chat_search_user', [ChatController::class, 'get_chat_search_user']);  
});

Route::group(['middleware'=>'teacher'], function () {    
   
    //account   
    Route::get('admin/account', [UserController::class, 'MyAccount']);    
    Route::post('admin/account', [UserController::class, 'UpdateMyAccount']);    

    //add teacher
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);    
    Route::get('admin/admin/list', [AdminController::class, 'list']);    
    Route::get('admin/admin/add', [AdminController::class, 'add']); 
    Route::post('admin/admin/add', [AdminController::class, 'insert']); 
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']); 
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']); 
    
    //add student
    Route::get('admin/student/list', [StudentController::class, 'list']);    
    Route::get('admin/student/add', [StudentController::class, 'add']); 
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']); 

    // subject   
    Route::get('admin/subject/list', [SubjectController::class, 'list']);    
    Route::get('admin/subject/add', [SubjectController::class, 'add']); 
    Route::post('admin/subject/add', [SubjectController::class, 'insert']); 
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']); 
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'delete']); 

    //homework
    Route::get('admin/homework/homework', [HomeworkController::class, 'homework']);    
    Route::get('admin/homework/homework/add', [HomeworkController::class, 'add']);    
    Route::post('admin/homework/homework/add', [HomeworkController::class, 'insert']);    
    Route::get('admin/homework/homework/edit/{id}', [HomeworkController::class, 'edit']); 
    Route::post('admin/homework/homework/edit/{id}', [HomeworkController::class, 'update']);
    Route::get('admin/homework/homework/delete/{id}', [HomeworkController::class, 'delete']);
    Route::get('admin/homework/homework/submitted/{id}', [HomeworkController::class, 'submitted']);

    //challenge 
    Route::get('admin/homework/challenge', [ChallengeController::class, 'homework']);    
    Route::get('admin/homework/challenge/add', [ChallengeController::class, 'add']);    
    Route::post('admin/homework/challenge/add', [ChallengeController::class, 'insert']);    
    Route::get('admin/homework/challenge/edit/{id}', [ChallengeController::class, 'edit']); 
    Route::post('admin/homework/challenge/edit/{id}', [ChallengeController::class, 'update']);
    Route::get('admin/homework/challenge/delete/{id}', [ChallengeController::class, 'delete']);

    //change password
    Route::get('admin/change_password', [UserController::class, 'change_password']); 
    Route::post('admin/change_password', [UserController::class, 'update_change_password']); 
});

    

Route::group(['middleware'=>'student'], function () {


    Route::get('student/account', [UserController::class, 'MyAccount']);    
    Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);    
    
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);   
    Route::get('student/list', [UserController::class, 'listall']); 
    Route::get('student/view/{id}', [UserController::class, 'view']);   
    
    //homework 
    Route::get('student/my_homework', [HomeworkController::class, 'HomeworkStudent']);    
    Route::get('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomework']);
    Route::post('student/my_homework/submit_homework/{id}', [HomeworkController::class, 'SubmitHomeworkInsert']);
    Route::get('student/my_submitted_homework', [HomeworkController::class, 'HomeworkSubmittedStudent']); 

    //challenge
    Route::get('student/challenge', [ChallengeController::class, 'ChallengeStudent']);    
    Route::get('student/challenge/submit/{id}', [ChallengeController::class, 'SubmitChallenge']);
    Route::post('student/challenge/submit/{id}', [ChallengeController::class, 'ProcessChallenge']);
    Route::post('student/challenge/result/{id}', [ChallengeController::class, 'ResultChallenge']);
    
    //change password
    Route::get('student/change_password', [UserController::class, 'change_password']); 
    Route::post('student/change_password', [UserController::class, 'update_change_password']); 
});
