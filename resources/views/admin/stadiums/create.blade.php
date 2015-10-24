@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Sukurti naują stadioną : </h3>

  <form method="POST" action="/dashboard/stadiums">

	{!! csrf_field() !!}

    <div class="form-group">
    {!! Form::label('stadium_title','Pavadinimas : ') !!}
    {!! Form::text('stadium_title',null,['class'=>'form-control']) !!}
    </div>
 

    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Sukurti stadioną</button>
    </div>
	
   </form>
</div>


@endsection