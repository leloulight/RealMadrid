@extends('admin')

@section('admin_content')
@include('admin.players.modals')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Sukurti naują žaidėją : </h3>

  <form method="POST" action="/dashboard/players" id="addPlayerFormUpload" enctype="multipart/form-data">

	{!! csrf_field() !!}

    <div class="form-group">
    {!! Form::label('player_name','Vardas : ') !!}
    {!! Form::text('player_name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('player_lastname','Pavardė : ') !!}
    {!! Form::text('player_lastname',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('birth_date','Gimimo data : ') !!}
    {!! Form::text('birth_date',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('birth_place','Gimimo vieta : ') !!}
    {!! Form::text('birth_place',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('player_weight','Svoris : ') !!}
    {!! Form::number('player_weight',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('player_height','Ūgis : ') !!}
    {!! Form::number('player_height',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      <label for="player_number">Numeris :</label>
      <input type="number" name="player_number" id="player_number" class="form-control">
    </div>

    <div class="form-group">
    <label for="season_id">Sezonas : </label>
      <select name="season_id" class="form-control">
        @foreach($seasons as $season)
          <option value="{!! $season->id !!}">{!! $season->title !!}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
    <label for="position_id">Pozicija : </label>
      <select name="position_id" class="form-control">
        @foreach($positions as $position)
          <option value="{!! $position->id !!}">{!! $position->title !!}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
    <label for="country_id">Šalis : </label>
<!--     <em><a  class="create-modal" data-toggle="modal" data-target="#myplayerCountryModal">(Sukurti naują šalį)</a></em>
 -->      <select name="country_id" class="form-control" id="playerCountry">
        @foreach($countries as $country)
          <option value="{!! $country->id !!}">{!! $country->title !!}</option>
        @endforeach
      </select>
    </div>


    <div class="form-group">
      <label>Žaidėjo nuotrauka:</label><br/>
      <input type="file" name="file" id="file" class="inputfile" accept="image/*" />
      <label for="file">
      <i class="fa fa-cloud-upload"></i>
      Įkelti žaidėjo nuotrauką</label>
      <span id="player_photo"></span>
    </div>
 
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Sukurti žaidėją</button>
    </div>
	
   </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#addPlayerFormUpload #file").change(function() {
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    console.log(fileName);
    $("#player_photo").text(fileName);
  });
  });
</script>



@endsection