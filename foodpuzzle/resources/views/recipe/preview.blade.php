@php

use \Illuminate\Support\Facades\Auth;
use App\Favorite;

/*Process file name*/
$filePath = $recipe->img_file;
$filePathInParts = explode('/', $filePath);
$fileName = $filePathInParts[1];

/* Check if the current recipe is favorite from logged in user. */
$isFavorite = false;
$isUser = false;
if (Auth::check()){
    $isUser = true;
    $user = Auth::user();
    $isFavorite = Favorite::isFavorite($recipe->id, $user->id);
}
@endphp
<div class="col-12 col-md-4">
    <div class="card" style="width:100%;position:relative;">
        <img src="{{asset('storage/' . $fileName)}}" class="card-img-top" alt="food-image"/>
        @if ($isUser)
        <a href="/recipe/favorite/{{$recipe->uuid}}" class="heart">
            <i style="color:red" class="{{$isFavorite? "fas fa-heart" : "far fa-heart"}}"></i>
        </a>
        @endif
        <div class="card-body">
            <a href="/recipe/{{$recipe->uuid}}" class="link">
                <p class="card-text">{{$recipe->rname}}</p>
            </a>
        </div>
    </div>
</div>

<style>
    .card-body a.link{float: left;}
    a.heart {display:block;color:red;background-color: #ffffff;border-radius: 50%;float: right;font-size:25px;position:absolute;right:-10px;top:-10px;height:40px;width:40px;}
    a.heart i {margin-left:8px;margin-top:8px;}
    .card .card-img-top{
        max-height:250px !important;
    }
</style>