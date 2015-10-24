<!-- resources/views/auth/login.blade.php -->
@extends('layout')

@section('content')
<div class="col-md-8 col-md-offset-2">
<h2 class="text-center">Vartotojo prisijungimas : </h2>

	<form method="POST" action="/auth/login">
	    {!! csrf_field() !!}

	@include('errors.list')

	    <div class="form-group">
	        <label for="email">El. paštas : </label>
	        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
	    </div>
	
	    <div class="form-group">
	         <label for="password">Slaptažodis : </label>
	        <input type="password" name="password" class="form-control" id="password">
	    </div>
	
	    <div class="form-group">
	        <input type="checkbox" name="remember"> Remember Me
	        <div class="pull-right">
	        <p>Arba prisijungt su:</p>
	        <i class="fa fa-facebook-official fa-4x"></i>
			<i class="fa fa-twitter-square fa-4x"></i>
			</div>
	    </div>
	
	    <div class="form-group">
	        <button type="submit" class="btn register-button">Prisijungti</button>
	    </div>


	</form>
</div>
@endsection