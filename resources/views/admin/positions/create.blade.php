@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Sukurti naują poziciją : </h3>

  <form method="POST" action="/dashboard/positions" id="positionsFormUpload" enctype="multipart/form-data">

	{!! csrf_field() !!}

    <div class="form-group">
    {!! Form::label('position_title','Pozicija : ') !!}
    {!! Form::text('position_title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('position_shortcode','Sutrumpinimas : ') !!}
    {!! Form::text('position_shortcode',null,['class'=>'form-control']) !!}
    </div>
 
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Sukurti poziciją</button>
    </div>
	
   </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#leagueFormUpload #file").change(function() {
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#file_upload").text(fileName);
  });
  });
</script>



@endsection