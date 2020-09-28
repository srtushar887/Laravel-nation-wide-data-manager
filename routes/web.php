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

        Route::get('/profile', [\App\Http\Controllers\User\UserController::class,'profile'])->name('user.profile');
        Route::post('/profile-update', [\App\Http\Controllers\User\UserController::class,'profile_update'])->name('user.profile.update');

        //change password
        Route::get('/change-password', [\App\Http\Controllers\User\UserController::class,'change_pass'])->name('user.change.password');
        Route::post('/change-password-save', [\App\Http\Controllers\User\UserController::class,'change_pass_save'])->name('user.change.password.save');

        //demo
        Route::get('/demo',[\App\Http\Controllers\User\UserDocumentController::class,'demo'])->name('user.demo');
        Route::post('/get-practice-filter',[\App\Http\Controllers\User\UserDocumentController::class,'get_practice_filter'])->name('user.get.practice.filter');


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
        Route::post('/users-update', [\App\Http\Controllers\Admin\AdminUserController::class,'users_update'])->name('admin.user.update');
        Route::post('/users-delete', [\App\Http\Controllers\Admin\AdminUserController::class,'users_delete'])->name('admin.user.delete');


        //upload document
        Route::post('/upload-document', [\App\Http\Controllers\Admin\AdminController::class,'upload_document'])->name('admin.upload.document');


        //demo
        Route::post('/get-practice-filter', [\App\Http\Controllers\Admin\AdminDocumentController::class,'get_practice_filter'])->name('admin.get.practice.filter');
        Route::post('/get-practice-by-search', [\App\Http\Controllers\Admin\AdminDocumentController::class,'get_practice_by_search'])->name('admin.get.data.by.search');


        Route::post('/get-singe-data', [\App\Http\Controllers\Admin\AdminDocumentController::class,'get_single_data'])->name('admin.get.singe.data');
        Route::post('/get-update-data', [\App\Http\Controllers\Admin\AdminDocumentController::class,'update_data'])->name('admin.update.document');


    });
});
