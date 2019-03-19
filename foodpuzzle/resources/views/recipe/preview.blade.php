@php

use \Illuminate\Support\Facades\Auth;
use App\Favorite;

/*Process file name*/
$filePath = $recipe->img_file;
$filePathInParts = explode('/', $filePath);
$fileName = $filePathInParts[1];

/* Check if the current recipe is favorite from logged in user. */
$isFavorite = false;
if (Auth::check()){
    $user = Auth::user();
    $isFavorite = Favorite::isFavorite($recipe->id, $user->id);
}
@endphp
<div class="col-12 col-md-4">
    <div class="card" style="width:100%">
        <img src="{{asset('storage/' . $fileName)}}" class="card-img-top" alt="food-image">
        <div class="card-body">
            <p class="card-text">
                {{$recipe->rname}}
            </p>
            <a href="recipe/favorite/{{$recipe->uuid}}" >
                <i style="color:red" class="{{$isFavorite? "fas fa-heart" : "far fa-heart"}}"></i>
            </a>
        </div>
    </div>
</div>

<style>
    .card-text {
        float: left;
    }
    .card-body a {
        color: grey; 
        float: right;
    }
</style>