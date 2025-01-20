<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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


Route::controller(HomeController::class)->group(function(){

    Route::match(['get' , 'post'] , '/' , 'index')->name('index');
    Route::match(['get' , 'post'] , 'user/save' , 'Usersave')->name('user-save');
    Route::match(['get' , 'post'] , 'user/delete' , 'Userdelete')->name('user-delete');
    Route::match(['get' , 'post'] , 'user/update' , 'Userupdate')->name('user-update');
    Route::match(['get' , 'post'] , 'user/edit' , 'Useredit')->name('user-edit');
    Route::match(['get' , 'post'] , 'user/list' , 'Userlist')->name('user.ajaxcall');

});

Route::controller(App\Http\Controllers\AjaxController::class)->group(function(){

    Route::match(['get' , 'post'] , 'ajax' , 'Ajax')->name('Ajax');
    
});

Route::controller(App\Http\Controllers\StudentController::class)->group(function(){

    Route::match(['get' , 'post'] , 'student' , 'student')->name('student');

    Route::match(['get' , 'post'] , 'student/save' , 'Usersave')->name('student-save');
    Route::match(['get' , 'post'] , 'student/delete' , 'Userdelete')->name('student-delete');
    Route::match(['get' , 'post'] , 'student/update' , 'Userupdate')->name('student-update');
    Route::match(['get' , 'post'] , 'student/edit' , 'Useredit')->name('student-edit');
    Route::match(['get' , 'post'] , 'student/list' , 'Userlist')->name('student.ajaxcall');

});