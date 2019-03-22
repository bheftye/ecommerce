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
$isOwner = false;
if (Auth::check()){
    $isUser = true;
    $user = Auth::user();
    $isFavorite = Favorite::isFavorite($recipe->id, $user->id);
    $isOwner = $recipe->u_id === $user->id;
}

if(strlen($recipe->rname)>30){
    $dot = "...";
    $rec = substr($recipe->rname, 0, 30).$dot;
}
else{
    $rec = $recipe->rname;
}
@endphp
<div class="col-12 col-md-4 mt-3">
    <div class="card" style="width:100%;position:relative;">
        <img src="{{asset('storage/' . $fileName)}}" class="card-img-top" alt="food-image"/>
        @if ($isUser && $showFavorites)
        <a href="/recipe/favorite/{{$recipe->uuid}}" class="heart">
            <i style="color:red" class="{{$isFavorite? "fas fa-heart" : "far fa-heart"}}"></i>
        </a>
        @endif
        @if ($isOwner && $showConfiguration)
            <a href="/recipe/delete/{{$recipe->uuid}}" class="trash" title="Delete">
                <i class="fas fa-trash-alt"></i>
            </a>
            <a href="/recipe/edit/{{$recipe->uuid}}" class="edit" title="Edit">
                <i class="fas fa-pencil-alt"></i>
            </a>
        @endif
        <div class="card-body">
            <a href="/recipe/{{$recipe->uuid}}" class="link">
                <p class="card-text">{{$rec}}</p>
            </a>
        </div>
    </div>
</div>

<style>
    .card-body a.link{float: left;}
    a.heart {display:block;color:red;background-color: #ffffff;border-radius: 50%;float: right;font-size:25px;position:absolute;right:-10px;top:-10px;height:40px;width:40px;}
    a.heart i {margin-left:8px;margin-top:8px;}
    .card .card-img-top{max-height:200px !important;}
    a.trash, a.edit{display:block;background-color:#ffffff;border-radius: 50%;font-size:18px;position:absolute;height:30px;width:30px;}
    a.trash{color:red;bottom:50px;right:5px;}
    a.edit{color:blue;bottom:50px;right:40px;}
    a.trash i, a.edit i{margin-left:7px;margin-top:5px;}
</style>