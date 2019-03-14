<div class="col-12 pt-5">
    <form id="recipe-form" class="row" method="POST" enctype="multipart/form-data" action="/recipe/create">
        <div class="col-12 col-md-6">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="text" name="rname" value="{{ old('rname') }}" placeholder="Recipe's name" required/>
                </div>
                @if ($errors->has('rname'))
                    <small class="alert-danger">
                        {{$errors->first('email')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
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
                <div class="input-group">
                    <textarea class="form-control" name="steps" placeholder="Recipe's steps" required>{{ trim(old('steps')) }}</textarea>
                </div>
                @if ($errors->has('steps'))
                    <small class="alert-danger">
                        {{$errors->first('steps')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="number"  name="calories" value="{{ old('calories') }}" placeholder="Calories"/>
                </div>
                @if ($errors->has('calories'))
                    <small class="alert-danger">
                        {{$errors->first('calories')}}
                    </small>
                @endif
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="number" name="fat" value="{{ old('fat') }}" placeholder=" % Fat"/>
                </div>
                @if ($errors->has('fat'))
                    <small class="alert-danger">
                        {{$errors->first('fat')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="number" name="carbohydrate" value="{{ old('carbohydrate') }}" placeholder="Carbohydrates"/>
                </div>
                @if ($errors->has('carbohydrate'))
                    <small class="alert-danger">
                        {{$errors->first('carbohydrate')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="number" name="protein" value="{{ old('protein') }}" placeholder=" % Protein"/>
                </div>
                @if ($errors->has('protein'))
                    <small class="alert-danger">
                        {{$errors->first('protein')}}
                    </small>
                @endif
            </div>

            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="number" name="sugar" value="{{ old('sugar') }}"  placeholder="Sugar"/>
                </div>
                @if ($errors->has('sugar'))
                    <small class="alert-danger">
                        {{$errors->first('sugar')}}
                    </small>
                @endif
            </div>

        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="vegan" {{old('vegan')? 'checked':''}} >
                    <label class="form-check-label" for="vegan">
                        Is this recipe vegan?
                    </label>
                </div>
                @if ($errors->has('vegan'))
                    <small class="alert-danger">
                        {{$errors->first('vegan')}}
                    </small>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
    </form>
</div>