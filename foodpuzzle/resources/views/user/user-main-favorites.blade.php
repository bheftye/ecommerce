@extends('layouts.main')

@section('title', "Log In Page")

@section('content')
<div class="row" style="height:100vh;">
	<div class="col-3 bg-info">
		@include('layouts.user-sidebar')
	</div>
	<div class="col-9 bg-danger">
		<div class="row">
	        @include('recipe.recipes', ['recipes' => $recipes])
	    </div>
	</div>	
</div>
@endsection