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

Route::get('/myregister', function () {
    return view('auth.register');
});

Route::get('/create', function () {
    return view('recipe.create');
});

Route::post('/search', 'Recipe\SearchRecipeController@search');

Route::get('/captcha', function () {
    return view('user.captcha');
});

Route::get('/usermain', function () {
    return view('user.user-main');
})->middleware('verified');

Route::get('/usermain/create', function () {
    return view('user.user-main-create');
})->middleware('verified');

Route::get('/usermain/favorites', function () {
    $recipes = [];
    if (Auth::check()){
        $recipes = Auth::user()->favorites;
    }
    return view('user.user-main-favorites')->with(['recipes' => $recipes]);
})->middleware('verified');

Route::get('/search-result', function () {
    return view('recipe.searchresultpage');
});

Route::prefix('recipe')->group(function () {

    Route::get('favorites', function (){
        $recipes = [];
        if (Auth::check()){
            $recipes = Auth::user()->favorites;
        }
        return view('recipe.favorites')->with(['recipes' => $recipes]);
    });

    Route::get('favorite/{uuid}', 'Recipe\RecipeController@favorite');

    Route::get('create', function () {
        return view('recipe.create');
    });

    Route::get('{uuid}', function ($uuid){
        $recipe = Recipe::where(['uuid' => $uuid])->first();
        if (!empty($recipe)){
            return view('recipe.detail')->with(['recipe' => $recipe]);
        } else {
            return redirect()->back();
        }
    });

    Route::post('create', 'Recipe\RecipeController@create');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::auth();


