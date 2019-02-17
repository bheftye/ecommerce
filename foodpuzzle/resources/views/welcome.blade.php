@extends('layouts.main')

@section('title', "Let's make dinner")

@php
$placeHolder = "Search your favourite recipes";
@endphp

@section('content')
<div class="row">
    <div class="col-12 pt-2" id="hcont">
        <div class="row justify-content-center">
            <h1>FoodPuzzle</h1>
        </div>
        <div class="row justify-content-center">
            <small>Let's make dinner</small>
        </div>
    </div>
    @include('welcome.form')
</div>
@endsection