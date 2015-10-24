@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Sukurti naują šalį : </h3>

  <form method="POST" action="/dashboard/countries" id="countriesFormUpload" enctype="multipart/form-data">

	{!! csrf_field() !!}

    <div class="form-group">
    {!! Form::label('country_title','Pavadinimas : ') !!}
    {!! Form::text('country_title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
      <label>Vėliava:</label><br/>
      <input type="file" name="file" id="file" class="inputfile" accept="image/*" />
      <label for="file">
      <i class="fa fa-cloud-upload"></i>
      Įkelti nuotrauką</label>
      <span id="file_upload"></span>
    </div>
 
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Sukurti šalį</button>
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