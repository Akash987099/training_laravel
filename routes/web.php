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

});
