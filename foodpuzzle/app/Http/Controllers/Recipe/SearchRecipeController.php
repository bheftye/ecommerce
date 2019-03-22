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

    	return view('recipe.searchresultpage', ['recipes' => $recipes]);
    }

    function adsearch(Request $req)
    {
        $this -> validate($req, [            
            'protein' => 'nullable|integer|between:0,100',
            'fat' => 'nullable|integer|between:0,100',
            'carbohydrate' => 'nullable|integer|between:0,100',
            'calories' => 'nullable|required_without_all:protein,fat,carbohydrate|integer',
        ]);

        $calories = $req->input('calories');
        $protein = $req->input('protein');
        $fat = $req->input('fat');
        $carbohydrate = $req->input('carbohydrate');

        if ($protein==''){
            $protein = 100;
        }
        if ($fat==''){
            $fat = 100;
        }
        if ($carbohydrate==''){
            $carbohydrate = 100;
        }
        if ($calories==''){
            $calories = 10000;
        }

        $recipes = DB::table('recipes')
        ->where([
            ['calories', '<=', $calories],
            ['protein', '<=', $protein],
            ['fat', '<=', $fat],
            ['carbohydrate', '<=', $carbohydrate],
        ])
        ->get();

        return view('recipe.searchresultpage', ['recipes' => $recipes]);
    }
}