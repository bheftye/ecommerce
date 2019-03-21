<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use DB;

class SearchRecipeController extends Controller
{
	function search(Request $req)
    {
    	$query = $req->input('query');

    	$recipes = DB::table('recipes')
        ->where('rname','LIKE','%' . $query . '%')
        ->orWhere('steps','LIKE','%' . $query . '%')
        ->get();

    	return view('welcome', ['recipes' => $recipes]);
    }

    function adsearch(Request $req)
    {
        $protein = $req->input('protein');
        $fat = $req->input('fat');
        $carbohydrate = $req->input('carbohydrate');

        $recipes = DB::table('recipes')
        ->where([
            ['protein', '<=', $protein],
            ['fat', '<=', $fat],
            ['carbohydrate', '<=', $carbohydrate],
        ])
        ->get();

        return view('recipe.searchresultpage', ['recipes' => $recipes]);
    }
}