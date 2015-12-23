
@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Sukurti naują kategoriją : </h3>

		<form method="POST" action="/dashboard/category">
		{!! csrf_field() !!}
		<div class="form-group">
    <br/>
			<label for="new-category">Pavadinimas :</label>
			<input type="text" name="category" class="form-control" />
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary form-control">Sukurti kategoriją</button>
			</div>
		</form>
		</div>


@endsection