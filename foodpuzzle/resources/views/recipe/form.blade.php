<style>
    #recipe-form .note-editor.note-frame{width:100%;}
</style>
<div class="col-12 pt-5 mb-5" style="background-color: rgb(245, 245, 240,0.7)">
    <form id="recipe-form" class="row" method="POST" enctype="multipart/form-data" action="/recipe/create">
        <div class="col-8 offset-2">
            @csrf
            <div class="form-group">
                Recipe's name:
                <div class="input-group">
                    <input class="form-control" type="text" name="rname" value="{{ old('rname') }}" placeholder="name" required/>
                </div>
                @if ($errors->has('rname'))
                    <small class="alert-danger">
                        {{$errors->first('email')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Recipe's picture:
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="file" aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                @if ($errors->has('file'))
                    <small class="alert-danger">
                        {{$errors->first('file')}}
                    </small>
                @endif
            </div>
            <div class="form-group">
                Recipe's ingredients:
                <div class="row">
                    <div class="col-11" id="add_item">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-5">
                                    <input class="form-control" type="text" name="ingredient[]" value="{{ old('') }}" placeholder="ingredient name in english" required/>
                                </div>
                                <div class="col-5">
                                    <input class="form-control" type="text" name="ingredientS[]" value="{{ old('') }}" placeholder="ingredient name in swedish" required/>
                                </div>
                                <div class="col-2">
                                    <input class="form-control" type="text" name="quantity[]" value="{{ old('') }}" placeholder="quantity" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <button class='btn btn-success btn-block' onclick="Add_ingredients()"> + </button>
                    </div>
                </div>

            </div>
            
            <div class="form-group">
                Recipe's steps:
                <div class="input-group">
                    <textarea id="summernote" class="form-control" name="steps" placeholder="Step 1:" required>{{ trim(old('steps')) }}</textarea>
                </div>
                @if ($errors->has('steps'))
                    <small class="alert-danger">
                        {{$errors->first('steps')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Calories(kcal):
                <div class="input-group">
                    <input class="form-control" type="number"  name="calories" value="{{ old('calories') }}" placeholder="kcal"/>
                </div>
                @if ($errors->has('calories'))
                    <small class="alert-danger">
                        {{$errors->first('calories')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Fat(%):
                <div class="input-group">
                    <input class="form-control" type="number" name="fat" value="{{ old('fat') }}" placeholder=" 0-100 %"/>
                </div>
                @if ($errors->has('fat'))
                    <small class="alert-danger">
                        {{$errors->first('fat')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Carbohydrates(g):
                <div class="input-group">
                    <input class="form-control" type="number" name="carbohydrate" value="{{ old('carbohydrate') }}" placeholder="g"/>
                </div>
                @if ($errors->has('carbohydrate'))
                    <small class="alert-danger">
                        {{$errors->first('carbohydrate')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Protein(%):
                <div class="input-group">
                    <input class="form-control" type="number" name="protein" value="{{ old('protein') }}" placeholder=" 0-100 %"/>
                </div>
                @if ($errors->has('protein'))
                    <small class="alert-danger">
                        {{$errors->first('protein')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Sugar(g):
                <div class="input-group">
                    <input class="form-control" type="number" name="sugar" value="{{ old('sugar') }}"  placeholder="g"/>
                </div>
                @if ($errors->has('sugar'))
                    <small class="alert-danger">
                        {{$errors->first('sugar')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="vegan" {{old('vegan')? 'checked':''}} >
                    <label class="form-check-label" for="vegan">
                        This is a vegan recipe
                    </label>
                </div>
                @if ($errors->has('vegan'))
                    <small class="alert-danger">
                        {{$errors->first('vegan')}}
                    </small>
                @endif
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">Save my recipe!</button>
        </div>
        
    </form>
</div>

<script type="text/javascript">
    function Add_ingredients() {
        var content = document.createElement("div");
        content.innerHTML =
            "<div class='input-group'>"+
                "<div class='row'>"+
                    "<div class='col-5'>"+
                        "<input class='form-control' type='text' name='ingredient[]' value='{{ old('') }}' placeholder='ingredient name in english' required/>"+
                    "</div>"+
                    "<div class='col-5'>"+
                        "<input class='form-control' type='text' name='ingredientS[]' value='{{ old('') }}' placeholder='ingredient name in swedish' required/>"+
                    "</div>"+
                    "<div class='col-2'>"+
                        "<input class='form-control' type='text' name='quantity[]' value='{{ old('') }}'' placeholder='quantity' required/>"+
                    "</div>"+
                "</div>"+
            "<div class='col-1'></div></div>";

        var temp = document.getElementById("add_item");
        temp.appendChild(content);
    }

    $('#summernote').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['strikethrough',]],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
        ],
        placeholder: 'Step 1: Do something',
        tabsize: 2,
        height: 150,
        name: 'steps',
        disableDragAndDrop: true,

    });
</script>