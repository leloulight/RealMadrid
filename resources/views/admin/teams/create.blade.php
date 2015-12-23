@extends('admin')

@section('admin_content')

@include('admin.teams.modals')
<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Sukurti naują komandą : </h3>

  <form method="POST" action="/dashboard/teams" id="teamFormUpload" enctype="multipart/form-data">

	{!! csrf_field() !!}

    <div class="form-group">
    {!! Form::label('team_title','Pavadinimas : ') !!}
    {!! Form::text('team_title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    <label for="stadium_id">Stadionas :</label>
    <em><a  class="create-modal" data-toggle="modal" data-target="#myteamStadiumModal">(Sukurti naują stadioną)</a></em>
      <select class="form-control" name="stadium_id" id="teamCreate-stadiums">
      @foreach($stadiums as $stadium)
        <option value="{!! $stadium->id !!}">{!! $stadium->title !!}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label>Komandos logo:</label><br/>
      <input type="file" name="file" id="file" class="inputfile" accept="image/*" />
      <label for="file">
      <i class="fa fa-cloud-upload"></i>
      Įkelti nuotrauką</label>
      <span id="file_upload2"></span>
    </div>
 
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Sukurti komandą</button>
    </div>
	
   </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#teamFormUpload #file").change(function() {
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#file_upload2").text(fileName);
  });
  });
</script>




@endsection