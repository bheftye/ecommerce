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

    	$recipes = DB::table('recipes')->where('rname','LIKE','%' . $query . '%')->get();

    	return view('recipe.searchresultpage', ['recipes' => $recipes]);
    }
}