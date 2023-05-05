<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;

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
Route::get('/admin/singup',[LoginController::class,'admin_singup'])->name('admin.singup_add');
Route::post('/admin/singup',[LoginController::class,'admin_create'])->name('admin.singup_create');

Route::get('/admin/login',[LoginController::class,'admin_signin'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'admin_login'])->name('admin.signin');

Route::get('admin/logout', [HomeController::class, 'admin_logout'])->name('admin.logout');

Route::get('/auth/google',[GoogleController::class,'redirectToGoogle']);
Route::get('/auth/google/callback',[GoogleController::class,'handleGoogleCallback']);

Route::get('/admin/forgot-password', [LoginController::class, 'admin_forgotPass'])->name('admin.forgot_pass');
Route::post('/admin/forgot-password', [LoginController::class, 'admin_postForgotPass'])->name('admin.forgot_pwd.post');
Route::get('/admin/reset-password/{xstr}', [LoginController::class, 'admin_resetPassword'])->name('admin.reset_pwd');
Route::post('/admin/set-new-password', [LoginController::class, 'admin_setNewPassword'])->name('admin.set_new_pwd');

################  Admin  ################
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('dashboard',[EventController::class, 'index'])->name('admin.list_event');
    Route::get('list-event',[EventController::class, 'index'])->name('admin.list_event');
    Route::get('event-add', [EventController::class, 'addevent'])->name('admin.event_add');
    Route::post('event-create', [EventController::class, 'storeevent'])->name('admin.event_create');
    Route::get('event-edit/{id}', [EventController::class, 'editevent'])->name('admin.event_edit');
    Route::post('event-update', [EventController::class, 'updateevent'])->name('admin.event_update');
    Route::get('event-delete', [EventController::class, 'deleteevent'])->name('admin.event_delete');

});

################  Common  ################
Route::get('/profile', [HomeController::class, 'myAccount'])->name('profile')->middleware('auth');
Route::post('/updateProfile', [HomeController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');

 Route::get('/change-password', [HomeController::class, 'changePwd'])->name('change_pwd')->middleware('auth');
 Route::post('/update-password', [HomeController::class, 'updatePwd'])->name('update_pwd')->middleware('auth');
