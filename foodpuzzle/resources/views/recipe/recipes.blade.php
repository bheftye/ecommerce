@php
$showFavorites = isset($showFavorites)? $showFavorites: true;
$showConfiguration = isset($showConfiguration)? $showConfiguration: false;
@endphp
<div class="col-12 mt-5">
    <div class="row">
        @if (count($recipes) > 0)
            @foreach($recipes as $recipe)
                @include('recipe.preview',
                [
                 'recipe' => $recipe,
                 'showFavorites' => $showFavorites,
                 'showConfiguration' => $showConfiguration
                 ])
            @endforeach
        @else
            <div class="col-md-12">
                <p>No recipes found.</p>
            </div>
        @endif
    </div>
</div>