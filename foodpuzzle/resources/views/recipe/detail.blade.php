@php
use Illuminate\Support\Facades\Auth;
use App\Favorite;
/**
*  $recipe Recipe Receives a recipe,
*/

/*Process file name*/
$filePath = $recipe->img_file;
$filePathInParts = explode('/', $filePath);
$fileName = $filePathInParts[1];

$isFavorite = false;
if (Auth::check()){
    $user = Auth::user();
    $isFavorite = Favorite::isFavorite($recipe->id, $user->id);
}

@endphp
@extends('layouts.main')

@section('title', $recipe->rname)

<style>
    img.detail{max-width:100%;height:auto}
    a.heart{position:relative;display:block;float:right;color:red;background-color:#ffffff;height:50px;width:50px;border-radius:50%;}
    a.heart:hover{color:red}
    a.heart i{margin-left:10px;margin-top:10px;}
    h3.title{font-size:30px;}
    p.author{font-size: 16px;font-style: italic;}
    .table thead th{border:hidden;}
    .table td, .table th {padding:.60rem !important;}
</style>

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <img class="detail" src="{{asset('storage/'.$fileName)}}" alt="recipe" />
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="row">
                            <div class="col-12">
                                <a href="/recipe/favorite/{{$recipe->uuid}}" class="heart">
                                    <i class="{{$isFavorite? "fa-2x fas fa-heart" : "fa-2x far fa-heart"}}"></i>
                                </a>
                                <h3 class="title">{{$recipe->rname}}</h3>
                                <p class="author">By <b>{{$recipe->user->name}}</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @include('recipe.detail.properties', ['recipe' => $recipe])
                        </div>
                    </div>
                </div>
                <div class="row">
                    @include('recipe.detail.ingredients', ['recipe' => $recipe])
                </div>
                <div class="row">
                    <div class="col-12 mt-5">
                        <h5>Steps:</h5>
                        <div>
                            {!!htmlspecialchars_decode($recipe->steps) !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection