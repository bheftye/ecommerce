@php
/**
* $recipe Recipe Recipe the user wants to edit.
* $action string Type of action the user wants to do [edit]
*/
@endphp
@extends('layouts.main')

@section('title', "Edit ".$recipe->rname)

@section('content')
    <div class="row" style="height:100vh;">
        <div class="col-2" style="background-color:rgba(107, 109, 95,0.6); position: fixed; height: 100%">
            @include('layouts.user-sidebar')
        </div>
        <div class="col-10 mt-2 offset-2">
            @include('recipe.form', ['recipe' => $recipe, 'action' => $action])
        </div>
    </div>
@endsection