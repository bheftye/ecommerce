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
    a.heart{display:block;color:red;float:right;}
    a.heart:hover{color:red}
    h3.title{font-size:30px;}
    p.author{font-size: 16px;font-style: italic;}
</style>

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-5">
                    <img class="detail" src="{{asset('storage/'.$fileName)}}" alt="recipe" />
                </div>
                <div class="col-12 col-md-7">
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
                        <div class="col-12">
                            <p class="properties">
                                calories: {{$recipe->calories}} kl
                                <br/>
                                fat: {{$recipe->fat}} %
                                <br/>
                                protein: {{$recipe->protein}} %
                                <br/>
                                carbohydrate: {{$recipe->carbohydrate}}
                                <br/>
                                sugar: {{$recipe->sugar}} g
                                <br/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 mt-5">
                    <h5>Steps:</h5>
                    <p>
                        {{$recipe->steps}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection