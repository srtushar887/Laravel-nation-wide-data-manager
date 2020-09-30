<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\Auth\UserLoginController::class,'index'])->name('user.login');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::group(['prefix' => 'dashboard'], function (){
        Route::get('/', [\App\Http\Controllers\User\UserController::class,'index'])->name('dashboard');

        //demo
        Route::get('/demo',[\App\Http\Controllers\User\UserDocumentController::class,'demo'])->name('user.demo');
        Route::post('/get-practice-filter',[\App\Http\Controllers\User\UserDocumentController::class,'get_practice_filter'])->name('user.get.practice.filter');
        Route::post('/get-practice-by-search', [\App\Http\Controllers\User\UserDocumentController::class,'get_practice_by_search'])->name('user.get.data.by.search');


        Route::post('/get-singe-data', [\App\Http\Controllers\User\UserDocumentController::class,'get_single_data'])->name('user.get.singe.data');
        Route::post('/get-update-data', [\App\Http\Controllers\User\UserDocumentController::class,'update_data'])->name('user.update.document');


    });
});



Route::prefix('admin')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'showLoginform'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Auth\AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::get('/logout', [\App\Http\Controllers\Auth\AdminLoginController::class,'logout'])->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard');


        //users
        Route::get('/users', [\App\Http\Controllers\Admin\AdminUserController::class,'users'])->name('admin.users');
        Route::get('/users-get', [\App\Http\Controllers\Admin\AdminUserController::class,'users_get'])->name('admin.get.users');
        Route::post('/users-save', [\App\Http\Controllers\Admin\AdminUserController::class,'users_save'])->name('admin.user.save');
        Route::post('/users-single', [\App\Http\Controllers\Admin\AdminUserController::class,'users_single'])->name('admin.get.single.user');
        Route::get('/user-edit/{id}', [\App\Http\Controllers\Admin\AdminUserController::class,'user_edit'])->name('admin.edit.user');
        Route::post('/users-update', [\App\Http\Controllers\Admin\AdminUserController::class,'users_update'])->name('admin.user.update');
        Route::post('/users-delete', [\App\Http\Controllers\Admin\AdminUserController::class,'users_delete'])->name('admin.user.delete');
        Route::post('/users-practice-delete', [\App\Http\Controllers\Admin\AdminUserController::class,'user_pracice_dlete'])->name('admin.user.practice.delete');



        //demo
        Route::post('/get-practice-filter', [\App\Http\Controllers\Admin\AdminDocumentController::class,'get_practice_filter'])->name('admin.get.practice.filter');
        Route::post('/get-practice-by-search', [\App\Http\Controllers\Admin\AdminDocumentController::class,'get_practice_by_search'])->name('admin.get.data.by.search');


        Route::post('/get-singe-data', [\App\Http\Controllers\Admin\AdminDocumentController::class,'get_single_data'])->name('admin.get.singe.data');
        Route::post('/get-update-data', [\App\Http\Controllers\Admin\AdminDocumentController::class,'update_data'])->name('admin.update.document');


        Route::get('/upload-pdf', [\App\Http\Controllers\Admin\AdminController::class,'upload_file'])->name('admin.upload.file');
        Route::post('/upload-pdf-save', [\App\Http\Controllers\Admin\AdminController::class,'upload_file_save'])->name('admin.pdf.file.save');


    });
});
