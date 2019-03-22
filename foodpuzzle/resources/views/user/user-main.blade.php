@extends('layouts.main')

@section('title', "Log In Page")

@section('content')
<div class="row" style="height:100vh;">
	<div class="col-2" style="background-color:rgba(107, 109, 95,0.6); position: fixed; height: 100%;">
		@include('layouts.user-sidebar')
	</div>
	<div class="col-10 offset-2">
		<div class="row">
	        @include('recipe.recipes', ['recipes' => $recipes, 'showFavorites' => false])
	    </div>
	</div>	
</div>
@endsection