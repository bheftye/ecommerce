@extends('layouts.main')

@section('title', "Log In Page")

@section('content')
<div class="row align-items-center">
	<div class="col-4 offset-4"><!-- Make sure login form stay at the center. -->
		<!--
			To login, user need to input their 'username' and 'password'.
			The 'login' function is in foodpuzzle\app\Http\Contollers\Controller.php
		-->
		<form class="form-signin" method="POST" action="/lookup">
			<br><br>
			@csrf
			<h1 class="row justify-content-center font-weight-normal">WELCOME</h1><br>

			<input type="text" name="inputName" class="form-control" placeholder="Username" required autofocus><br>
			<input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

			<div class="checkbox col">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div><br>

			<button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button>

			<p class="row justify-content-center mt-5 mb-3 text-muted">
				&copy; E-Commerce Project 2019
			</p>
		</form>
	</div>
</div>
@endsection
