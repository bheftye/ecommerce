<?php

use App\Recipe;
use \Illuminate\Support\Facades\Auth;
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
    $recipes = Recipe::all();
    return view('welcome')->with(['recipes' => $recipes]);
});


Route::get('/mylogin', function () {
    return view('auth.login');
});

Route::post('/lookup', 'Controller@login');

Route::get('/myregister', function () {
    return view('auth.register');
});

Route::post('/insert', 'Controller@insert');

Route::get('/create', function () {
    return view('recipe.create');
});

Route::get('/captcha', function () {
    return view('user.captcha');
});

Route::get('/search-result', function () {
    return view('recipe.searchresultpage');
});


Route::prefix('recipe')->group(function () {

    Route::get('favorites', function (){
        $recipes = Auth::user()->favorites;
        return view('recipe.favorites')->with(['recipes' => $recipes]);
    });

    Route::get('favorite/{uuid}', 'Recipe\RecipeController@favorite');

    Route::get('create', function () {
        return view('recipe.create');
    });

    Route::get('{id}', function ($id){
        $recipe = Recipe::findOrFail(['uuid' => $id]);
        return view('recipe.view')->with(['recipe' => $recipe]);
    });

    Route::post('create', 'Recipe\RecipeController@create');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();
