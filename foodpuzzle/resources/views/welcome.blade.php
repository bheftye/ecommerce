@extends('layouts.main')

@section('title', "Let's make dinner")

@php
$placeHolder = "Search your favourite recipes";
@endphp

@section('content')
<div class="row">
    <div class="col-12 pt-5">
        <form id="search-form" method="POST" action="/search">
            @csrf
            <div class="form-group">
                <input class="form-control" id="search" name="query" placeholder="{{$placeHolder}}"/>
            </div>
        </form>
    </div>
</div>
@endsection