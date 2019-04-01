<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/amy.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="{{URL::asset('summernote/summernote-lite.css')}}">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="{{URL::asset('summernote/summernote-lite.min.js')}}"></script>

	<title>FoodPuzzle - @yield('title')</title>

	<style type="text/css">
		body{
			background-image: url("/image/background.png"); 
			background-repeat: no-repeat;
  			background-attachment: fixed;
  			background-position: center; 
		}
	</style>
	<style>
		/* Always set the map height explicitly to define the size of the div
		* element that contains the map. */
		#map {
			height: 100%;
		}
    </style>

</head>
<body>
	@include('welcome.navbar')
	@include('menu.menu')
	<div class="container-fluid" style="margin-top:50px">
		@yield('content')
	</div>
	<!-- Google Map API -->
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCYrNVfzwkBIu0ir5FsmiHygRZGejCiFuI&callback=initMap&libraries=places">
	</script>

	<script src="{{asset('js/mapscript.js')}}"></script>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</body>
</html>
