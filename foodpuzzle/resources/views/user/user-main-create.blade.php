@extends('layouts.main')

@section('title', "Create Recipe!")

@section('content')
<div class="row" style="height:100vh;">
	<div class="col-2" style="background-color:rgba(107, 109, 95,0.6); position: fixed; height: 100%">
		@include('layouts.user-sidebar')
	</div>
	<div class="col-10 mt-2 offset-2">
		@include('recipe.form')
	</div>	
</div>
@endsection