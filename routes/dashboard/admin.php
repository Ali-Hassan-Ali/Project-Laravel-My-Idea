<?php 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\Admin\HomeController;
use App\Http\Controllers\Dashboard\Admin\AdminController;
use App\Http\Controllers\Dashboard\Admin\CategoryController;
use App\Http\Controllers\Dashboard\Admin\IdeaController;
use App\Http\Controllers\Dashboard\Admin\SettingController;
use App\Http\Controllers\Dashboard\Admin\Auth\AuthController;


Route::get('/dashboard/admin/login', [AuthController::class, 'form_login'])
	 ->name('dashboard.admin.login');

Route::post('/dashboard/admin/login', [AuthController::class, 'login_store'])
	 ->name('dashboard.admin.login.store');

Route::post('/dashboard/admin/logout', [AuthController::class, 'logout'])
	 ->name('dashboard.admin.logout');

Route::prefix('dashboard/admin')->name('dashboard.admin.')->middleware('auth:admin')->group(function () {

	Route::get('/', [HomeController::class, 'index'])->name('home');

	// seeting route
	Route::get('/seeting', [SettingController::class, 'index'])->name('settings.index');
	Route::post('/seeting/store', [SettingController::class, 'store'])->name('settings.store');

	//admin routes
    Route::get('/admins/data', [AdminController::class, 'data'])->name('admins.data');
    Route::delete('/admins/bulk_delete', [AdminController::class, 'bulkDelete'])->name('admins.bulk_delete');
	Route::resource('admins', AdminController::class);

	// categorys
	Route::get('/categorys/data', [CategoryController::class, 'data'])->name('categorys.data');
    Route::delete('/categorys/bulk_delete', [CategoryController::class, 'bulkDelete'])->name('categorys.bulk_delete');
	Route::resource('categorys', CategoryController::class);

	// ideas
	Route::get('/ideas/data', [IdeaController::class, 'data'])->name('ideas.data');
    Route::delete('/ideas/bulk_delete', [IdeaController::class, 'bulkDelete'])->name('ideas.bulk_delete');
	Route::resource('ideas', IdeaController::class);

});//group(function