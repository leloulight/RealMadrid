@extends('admin')

@section('admin_content')
<h1 class="text-center">Kategorijos pakeitimai - {!! $category->title !!}</h1>


<div class="col-md-10 col-md-offset-1">
@include('errors.list')
		<form action="/dashboard/category/{!! $category->id !!}/redaguoti" method="POST" id="editLeagueForm">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">Pavadinimas : </label>
	    <input type="text" class="form-control" name="title" placeholder="Pavadinimas" value="{!! $category->title !!}">
	  </div>

	  <button type="submit" class="btn btn-primary form-control">Redaguoti</button>

	</form>
</div>	


@endsection


