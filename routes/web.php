<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\IdeaController;
use App\Http\Controllers\Site\Auth\AuthController;
use App\Http\Controllers\Site\GuarpController;
use App\Http\Controllers\Site\ChatController;
use App\Http\Controllers\Site\ConsultingController;
use App\Http\Controllers\Site\InspiringStorieController;

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


Route::get('/new-login', function () {
    return view('site.auth.login');
});

Route::get('/new-register', function () {
    return view('site.auth.register');
});

Route::name('site.')->group(function () {

    // Route::post('login', [AuthController::class, 'login'])->name('loginm');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //admin routes
    Route::get('ideas/like/{idea}', [IdeaController::class, 'like'])->name('ideas.like.store');
    Route::post('/comment', [IdeaController::class, 'comment'])->name('ideas.comment');
    Route::resource('ideas', IdeaController::class);

    //groups routes
    Route::get('/ideas/groups/{idea}', [GuarpController::class, 'index'])->name('ideas.groups.index');
    Route::get('/ideas/groups/create/{idea}', [GuarpController::class, 'create'])->name('ideas.groups.create');
    Route::post('/ideas/groups/store', [GuarpController::class, 'store'])->name('ideas.groups.store');
    Route::get('/ideas/groups/show/{group}', [GuarpController::class, 'show'])->name('ideas.groups.show');
    Route::get('/ideas/groups/join/{group}', [GuarpController::class, 'join'])->name('ideas.groups.join');

    //store routes
    Route::post('/ideas/chat/store/', [ChatController::class, 'store'])->name('ideas.groups.chat.store');

    // consultings routes
    Route::get('consultings/like/{consulting}', [ConsultingController::class, 'like'])->name('consultings.like.store');
    Route::resource('consultings', ConsultingController::class);

    // inspiring_stories routes
    Route::get('inspiring_stories/like/{inspiring_storie}', [InspiringStorieController::class, 'like'])->name('inspiring_stories.like.store');
    Route::resource('inspiring_stories', InspiringStorieController::class);

});//group(function

Auth::routes();