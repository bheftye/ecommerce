@extends('layouts.main')

@section('title', "Log In Page")

@section('content')
<div class="row" style="height:100vh;">
	<div class="col-3 bg-info">
		@include('layouts.user-sidebar')
	</div>
	<div class="col-9 bg-danger">
		<div class="row">
	        <div class="col-12 pt-2" id="hcont">
	            <div class="row justify-content-center">
	                <h1>FoodPuzzle</h1>
	            </div>
	            <div class="row justify-content-center">
	                <small>Let's make dinner</small>
	            </div>
	        </div>
	        @include('recipe.recipes', ['recipes' => $recipes])
	    </div>
	</div>	
</div>
@endsection