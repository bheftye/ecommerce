@php
/*Process file name*/
$filePath = $recipe->img_file;
$filePathInParts = explode('/', $filePath);
$fileName = $filePathInParts[1];
$isFavorite = \App\Favorite::isFavorite($recipe->id, 1);
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