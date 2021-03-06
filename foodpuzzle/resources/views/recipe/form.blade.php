@php
    /**
    * $recipe Recipe Recipe the user wants to edit.
    * $action string Type of action the user wants to do [edit]
    */
$action = isset($action)? $action : "create";
$edit = false;
if ($action === "edit"){
    $action = $action . '/' .$recipe->uuid;
    $edit = true;

    /*Process file name*/
    $filePath = $recipe->img_file;
    $filePathInParts = explode('/', $filePath);
    $fileName = $filePathInParts[1];
}

@endphp

<style>
    #recipe-form .note-editor.note-frame{width:100%;}
</style>
<div class="col-12 pt-5 pb-5" style="background-color: rgb(245, 245, 240, 0.7)">
    <form id="recipe-form" class="row" method="POST" enctype="multipart/form-data" action="/recipe/{{$action}}">
        <div class="col-10">
            @csrf
            <div class="form-group">
                Recipe's name<font color="red">*</font>:
                <div class="input-group">
                    <input class="form-control" type="text" name="rname" value="{{ old('rname')? old('rname') : $edit? $recipe->rname : '' }}" placeholder="name" required/>
                </div>
                @if ($errors->has('rname'))
                    <small class="alert-danger">
                        {{$errors->first('email')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Recipe's picture<font color="red">*</font>:
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="file" aria-describedby="inputGroupFileAddon01" {{$edit? '' :'required'}}>
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                @if ($errors->has('file'))
                    <small class="alert-danger">
                        {{$errors->first('file')}}
                    </small>
                @endif
                @if ($edit)
                    <img src="{{asset('storage/' . $fileName)}}" alt="Current Image" width="100" title="Current Saved Image" />
                @endif
            </div>

            <div class="form-group">
                Recipe's ingredients<font color="red">*</font>:
                <div class="row">
                    <div class="col-11" id="add_item">
                        @if(!empty(old('ingredient')))
                            @php
                                $ingredients = old('ingredient');
                                $ingredientsS = old('ingredientS');
                                $quantity = old('quantity');
                            @endphp
                            @for($i = 0; $i < count($ingredients); $i++)
                                <div class="input-group mt-1">
                                    <div class="row">
                                        <div class="col-5">
                                            <input class="form-control" type="text" name="ingredient[]" value="{{ $ingredients[$i]}}" placeholder="ingredient name in english" required/>
                                        </div>
                                        <div class="col-5">
                                            <input class="form-control" type="text" name="ingredientS[]" value="{{ $ingredientsS[$i] }}" placeholder="ingredient name in swedish" required/>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-control" type="text" name="quantity[]" value="{{ $quantity[$i] }}" placeholder="quantity" required/>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @else
                            @if ($edit)
                                @foreach($recipe->ingredients as $ingredient)
                                    <div class="input-group mt-1">
                                        <div class="row">
                                            <div class="col-5">
                                                <input class="form-control" type="text" name="ingredient[]" value="{{ $ingredient->food->enname}}" placeholder="ingredient name in english" required/>
                                            </div>
                                            <div class="col-5">
                                                <input class="form-control" type="text" name="ingredientS[]" value="{{ $ingredient->food->svname }}" placeholder="ingredient name in swedish" required/>
                                            </div>
                                            <div class="col-2">
                                                <input class="form-control" type="text" name="quantity[]" value="{{ $ingredient->quantity }}" placeholder="quantity" required/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="input-group mt-1">
                                    <div class="row">
                                        <div class="col-5">
                                            <input class="form-control" type="text" name="ingredient[]" value="" placeholder="ingredient name in english" required/>
                                        </div>
                                        <div class="col-5">
                                            <input class="form-control" type="text" name="ingredientS[]" value="" placeholder="ingredient name in swedish" required/>
                                        </div>
                                        <div class="col-2">
                                            <input class="form-control" type="text" name="quantity[]" value="" placeholder="quantity" required/>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="col-1">
                        <button class='btn btn-success btn-block' onclick="Add_ingredients()"> + </button>
                    </div>
                </div>
                @if ($errors->has('ingredient'))
                    <small class="alert-danger">
                        {{$errors->first('ingredient')}}
                    </small>
                @endif
            </div>
            
            <div class="form-group">
                Recipe's steps<font color="red">*</font>:
                <div class="input-group">
                    <textarea id="summernote" class="form-control" name="steps" placeholder="Step 1:" required>
                        {{ old('steps')? trim(old('steps')) : $edit? trim(htmlspecialchars_decode($recipe->steps)) : '' }}
                    </textarea>
                </div>
                @if ($errors->has('steps'))
                    <small class="alert-danger">
                        {{$errors->first('steps')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Recipe's Youtube tutorial:
                <div class="input-group">
                    <input type="text" class="form-control" name="link" placeholder="Link Youtube Ex. https://youtube.com/watch?v=4hj234" value="{{ old('link')? old('link') : $edit? $recipe->link : '' }}">
                </div>
                @if ($errors->has('link'))
                    <small class="alert-danger">
                        {{$errors->first('link')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Calories(kcal)<font color="red">*</font>:
                <div class="input-group">
                    <input class="form-control" type="number" step="any" min="0"  name="calories" value="{{ old('calories')? old('calories') : $edit? $recipe->calories : '' }}" placeholder="kcal"/>
                </div>
                @if ($errors->has('calories'))
                    <small class="alert-danger">
                        {{$errors->first('calories')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Fat(%)<font color="red">*</font>:
                <div class="input-group">
                    <input class="form-control" type="number" step="any" min="0" max="100" name="fat" value="{{ old('fat')? old('fat') : $edit? $recipe->fat : '' }}" placeholder=" 0-100 %"/>
                </div>
                @if ($errors->has('fat'))
                    <small class="alert-danger">
                        {{$errors->first('fat')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Carbohydrates(g)<font color="red">*</font>:
                <div class="input-group">
                    <input class="form-control" type="number" step="any" min="0" name="carbohydrate" value="{{ old('carbohydrate')? old('carbohydrate') : $edit? $recipe->carbohydrate : '' }}" placeholder="g"/>
                </div>
                @if ($errors->has('carbohydrate'))
                    <small class="alert-danger">
                        {{$errors->first('carbohydrate')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Protein(%)<font color="red">*</font>:
                <div class="input-group">
                    <input class="form-control" type="number" step="any" min="0" max="100" name="protein" value="{{ old('protein')? old('protein') : $edit? $recipe->protein : '' }}" placeholder=" 0-100 %"/>
                </div>
                @if ($errors->has('protein'))
                    <small class="alert-danger">
                        {{$errors->first('protein')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                Sugar(g)<font color="red">*</font>:
                <div class="input-group">
                    <input class="form-control" type="number" step="any" min="0" name="sugar" value="{{ old('sugar')? old('sugar') : $edit? $recipe->sugar : '' }}"  placeholder="g"/>
                </div>
                @if ($errors->has('sugar'))
                    <small class="alert-danger">
                        {{$errors->first('sugar')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="vegan" {{ old('vegan')? 'checked' : $edit? ($recipe->vegan? 'checked':'') : '' }} />
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
            "<div class='input-group mt-1'>"+
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