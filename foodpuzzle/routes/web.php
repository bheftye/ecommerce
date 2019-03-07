<?php

use App\Recipe;
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

Route::prefix('recipe')->group(function () {
    Route::get('create', function () {
        return view('recipe.create');
    });

    Route::get('{id}', function ($id){
        $recipe = Recipe::findOrFail(['uuid' => $id]);
        return view('recipe.view')->with(['recipe' => $recipe]);
    });

    Route::post('create', 'Recipe\RecipeController@create');


});

Route::prefix('recipes')->group(function (){
   Route::get('{id}', function ($id){

     return response()->file($id);
   });
});
