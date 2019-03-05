<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('user.login-form');
});

Route::get('/register', function () {
    return view('user.register');
});

Route::get('/create', function () {
    return view('recipe.create');
});

Route::get('/captcha', function () {
    return view('user.captcha');
});

Route::get('/search-result', function () {
    return view('recipe.searchresultpage');
});