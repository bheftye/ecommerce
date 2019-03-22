@extends('layouts.main')

@section('title', "Let's make dinner")

@php
    $placeHolder = "Search your favourite recipes";
    /**
    * $recipes array Receives an array of recipes.
    */
@endphp

@section('content')
    <div class="row mb-3">
        <div class="col-12 pt-2" id="hcont">
            <div class="row justify-content-center">
                <h1>FoodPuzzle</h1>
            </div>
            <div class="row justify-content-center">
                <small>Let's make dinner</small>
            </div>
        </div>
        <div class="col-10 offset-1">
            <div class="row">
                @include('welcome.form')
            </div>
        </div>
        <div class="col-10 offset-1">
            <div class="row">
                @include('recipe.recipes', ['recipes' => $recipes])
            </div>
        </div>
    </div>
@endsection