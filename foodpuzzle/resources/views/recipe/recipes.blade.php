<div class="col-12 mt-5">
    <div class="row">
        @if (count($recipes) > 0)
            @foreach($recipes as $recipe)
                @include('recipe.preview', ['recipe' => $recipe])
            @endforeach
        @else
            <p>No recipes found.</p>
        @endif
    </div>
</div>