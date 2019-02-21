<div class="col-12 pt-5">
    <form id="recipe-form" method="POST" action="/recipe/create">
        @csrf
        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="text" name="name" placeholder="Recipe's name"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <textarea class="form-control" name="steps" placeholder="Recipe's steps"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="number" name="calories" placeholder="Calories"/>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="number" name="fat" placeholder=" % Fat"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="number" name="carbohydrate" placeholder="Carbohydrates"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="number" name="protein" placeholder=" % Protein"/>
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="number" name="sugar" placeholder="Sugar"/>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
    </form>
</div>