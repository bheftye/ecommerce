<div class="col-12 mt-5">
    <div class="row">
        @foreach($recipes as $recipe)
            @include('recipe.preview', ['recipe' => $recipe])
        @endforeach
    </div>
</div>