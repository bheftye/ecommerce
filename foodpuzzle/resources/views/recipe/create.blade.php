@extends('layouts.main')

@section('title', "Create a recipe!")

@section('content')
    <div class="row" style="background-color:rgba(182, 184, 173, 0.5);">
        <div class="col-12 pt-2" id="hcont">
            <div class="row justify-content-center">
                <h1>FoodPuzzle</h1>
            </div>
            <div class="row justify-content-center">
                <small>Let's make dinner</small>
            </div>
        </div>
        @include('recipe.form')
    </div>
@endsection