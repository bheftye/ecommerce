@extends('layouts.main')

@section('title', "Log In Page")

@section('content')
<div class="row" style="height:100vh;">
	<div class="col-2" style="background-color:rgba(107, 109, 95,0.6);">
		@include('layouts.user-sidebar')
	</div>
	<div class="col-10 mt-2">
		@include('recipe.form')
	</div>	
</div>
@endsection