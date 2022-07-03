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

Auth::routes();
Route::get('/home', function () {
    return view('home');
});

Route::get('/new-login', function () {
    return view('site.auth.login');
});

Route::get('/idea', function () {
    
    $ideas = \App\Models\Idea::all();

    return view('site.idea.index', compact('ideas'));
});

Route::get('/idea.create', function () {
    return view('site.idea.create');
});

Route::get('/new-register', function () {
    return view('site.auth.register');
});
