@extends('layouts.main')

@section('title', "Maps")

@section('content')
<div class="row" style="height:100vh;">
	<div class="col-2" style="position:fixed;background-color:rgba(107, 109, 95,0.6);">
		<nav
		    class="nav justify-content-center"
		    style="position:relative; height:100vh; overflow: auto;"
		>

		  <form style="margin-top:40px" method="POST" action="/adsearch">
		    @csrf
		    <br>
		    <a class="btn btn-success btn-lg btn-block" href="{{ URL::previous() }}" style="color:white">Back</a> 
		  </form>
		</nav>
	</div>
	<div class="col-10 mt-2 offset-2">
		<div id="map"></div>		
	</div>
</div>
@endsection