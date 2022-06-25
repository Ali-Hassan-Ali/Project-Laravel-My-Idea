<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard/admin/login', 
	[App\Http\Controllers\Dashboard\Admin\Auth\AuthController::class, 
	'form_login'])->name('dashboard.admin.login');

Route::post('/dashboard/admin/login', 
	[App\Http\Controllers\Dashboard\Admin\Auth\AuthController::class, 
	'login_store'])->name('dashboard.admin.login.store');

Route::post('/dashboard/admin/logout', 
	[App\Http\Controllers\Dashboard\Admin\Auth\AuthController::class, 
	'logout'])->name('dashboard.admin.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->middleware('auth:admin')->group(function () {

	Route::get('/', [App\Http\Controllers\Dashboard\Admin\HomeController::class, 'index'])->name('home');

	Route::resource('admins', App\Http\Controllers\Dashboard\Admin\AdminController::class);

});//group(function