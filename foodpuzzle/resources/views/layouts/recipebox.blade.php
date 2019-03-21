<div class="row">
  @if (count($recipes) > 0)
    @foreach($recipes as $recipe)
      @include('recipe.preview', ['recipe' => $recipe])
    @endforeach
  @else
    <p>No recipes found.</p>
  @endif
  <!-- <div class="card w-25" style="padding: 10px;background-color:rgba(255,255,255,0.3);">

    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#FF7F50"/><text x="30%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

    <div class="card-body" style="background-color:rgba(182, 184, 173, 0.7);">
      <p class="card-title">Recipe Name</p>
      <div class="d-flex justify-content-between align-items-center">
        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
      </div>
    </div>

  </div> -->
</div>