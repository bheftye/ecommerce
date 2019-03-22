<nav
    class="nav justify-content-center"
    style="position:relative; height:100vh; overflow: auto;"
>

  <form style="margin-top:40px" method="POST" action="/adsearch">
    @csrf
    <br>
    <h6 class="row justify-content-center font-weight-normal" style="color: white;">WELCOME</h6><br>

    Calories(kcal)
    <input 
        type="number" 
        name="calories" 
        class="form-control" 
        placeholder="e.g. 350 kcal"
        autofocus
    >
    <br>
    Protein(0-100%)
    <input 
        type="number" 
        name="protein" 
        class="form-control" 
        placeholder="0-100"
    >
    <br>
    Fat(0-100%)
    <input 
        type="number" 
        name="fat" 
        class="form-control" 
        placeholder="0-100"
    >
    <br>
    Carbohydrate(grams)
    <input 
        type="number" 
        name="carbohydrate" 
        class="form-control" 
        placeholder="i.e. 300 grams"
    >
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>

    <a class="btn btn-success btn-lg btn-block" href="/usermain" style="color:white">Back</a> 
  </form>
</nav>