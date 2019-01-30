<form id="form-movie" method="post" action="./../backend/actions.php?action=create">
  <div class="form-group">
    <input 
      type="text" 
      class="form-control"
      id="name"
      name="name" 
      aria-describedby="nameHelp"
      placeholder="Movie Name" />
      <small 
        id="nameHelp" 
        class="form-text 
        text-muted">Use the whole name of the movie
      </small>
  </div>
  <div class="form-group">
    <input 
      type="text" 
      class="form-control"
      id="year"
      name="year"
      aria-describedby="yearHelp"
      placeholder="From Year">
      <small 
        id="yearHelp" 
        class="form-text 
        text-muted">When did the movie premiered
      </small>
  </div>
  <div class="form-group">
    <label for="genre">Select Genre</label>
    <select class="form-control" id="genre" name="genre">
      <option>Terror</option>      
    </select>
  </div>
  <div class="form-group">
    <input 
      type="text" 
      class="form-control"
      id="rating"
      name="rating"
      aria-describedby="ratingHelp"
      placeholder="Movie Rating">
      <small 
        id="ratingHelp" 
        class="form-text 
        text-muted">Consider the rating out of 10
      </small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>