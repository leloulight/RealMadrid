@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Redaguoti poziciją : </h3>

  <form method="POST" action="/dashboard/positions/{!! $position->id !!}/redaguoti" id="positionsFormUpload" enctype="multipart/form-data">

	{!! csrf_field() !!}

    <div class="form-group">
    <label for="position_title">Pozicija :</label>
    <input type="text" name="position_title" value="{!! $position->title !!}" class="form-control" />
    </div>

    <div class="form-group">
    <label for="position_shortcode">Sutrumpinimas :</label>
    <input type="text" name="position_shortcode" value="{!! $position->shortcode !!}" class="form-control" />
    </div>
 
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Redaguoti poziciją</button>
    </div>
	
   </form>
</div>

@endsection