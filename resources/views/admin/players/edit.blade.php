@extends('admin')

@section('admin_content')
@include('admin.players.modals')
<h1 class="text-center">Žaidėjo pakeitimai - {!! $player->name." ".$player->lastname !!}</h1>


<div class="col-md-10 col-md-offset-1">
@include('errors.list')
		<form action="/dashboard/players/{!! $player->id !!}/redaguoti" method="POST" id="editLeagueForm" enctype="multipart/form-data">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">Vardas : </label>
	    <input type="text" class="form-control" name="name" placeholder="Vardas" value="{!! $player->name !!}">
	  </div>

	  <div class="form-group">
	    <label for="lastname">Pavardė : </label>
	    <input type="text" class="form-control" name="lastname" placeholder="Pavardė" value="{!! $player->lastname !!}">
	  </div>

	  <div class="form-group">
	    <label for="birthdate">Gimimo data : </label>
	    <input type="text" class="form-control" name="birthdate" placeholder="Gimimo data" value="{!! $player->birth_date !!}">
	  </div>

	  <div class="form-group">
	    <label for="birthplace">Gimimo vieta : </label>
	    <input type="text" class="form-control" name="birthplace" placeholder="Gimimo vieta" value="{!! $player->birth_place !!}">
	  </div>

	  <div class="form-group">
	    <label for="player_weight">Svoris : </label>
	    <input type="number" class="form-control" name="player_weight" placeholder="Svoris" value="{!! $player->weight !!}">
	  </div>

	  <div class="form-group">
	    <label for="player_height">Ūgis : </label>
	    <input type="number" class="form-control" name="player_height" placeholder="Ūgis" value="{!! $player->height !!}">
	  </div>

	  <div class="form-group">
	    <label for="player_number">Numeris : </label>
	    <input type="number" class="form-control" name="player_number" placeholder="Numeris" value="{!! $player->number !!}">
	  </div>

	  <div class="form-group">
	  	<label for="season_id">Sezonas :</label>
	  	<select name="season_id" id="season_id" class="form-control" >
			@foreach($seasons as $season)
				@if($player->season_id == $season->id)
					<option selected value="{!! $season->id !!}">{!! $season->title !!}</option>
				@else
					<option value="{!! $season->id !!}">{!! $season->title !!}</option>
				@endif
			@endforeach
		</select>
	  </div>

	  <div class="form-group">
	  	<label for="position_id">Pozicija :</label>
	  	<select name="position_id" id="position_id" class="form-control" >
			@foreach($positions as $position)
				@if($player->position_id == $position->id)
					<option selected value="{!! $position->id !!}">{!! $position->title !!}</option>
				@else
					<option value="{!! $position->id !!}">{!! $position->title !!}</option>
				@endif
			@endforeach
		</select>
	  </div>

	  <div class="form-group">
	  	<label for="country_id">Šalis :</label>
<!-- 	  	<em><a  class="create-modal" data-toggle="modal" data-target="#myplayerCountryModal">(Sukurti naują šalį)</a></em>
 -->	  	<select name="country_id" id="country_id" class="form-control" >
			@foreach($countries as $country)
				@if($player->country_id == $country->id)
					<option selected value="{!! $country->id !!}">{!! $country->title !!}</option>
				@else
					<option value="{!! $country->id !!}">{!! $country->title !!}</option>
				@endif
			@endforeach
		</select>
	  </div>
	
	           @if ($player->photo)
                <div class="edit-post-image">
                <img src="/{!! $player->photo !!}" title="{!! $player->name." ".$player->lastname !!}">
                </div>
                <div id="profile-upload">
	                 <div class="form-group">
				      <label>Žaidėjo nuotrauka:</label><br/>
				      <input type="file" name="edit-player-photo" id="file" class="inputfile" accept="image/*" />
				      <label for="file">
				      <i class="fa fa-cloud-upload"></i>
				      Įkelti nuotrauką</label>
				      <br/>
				      <span id="file_upload"></span>
				      <div id="files_names"></div>
				    </div>
			    </div>
			    @else
			    <div id="profile-upload">
	                <h4>Nuotrauka nebuvo įkelta</h4>
	                <p>Įkelkite nuotrauką :</p>
	                 <div class="form-group">
				      <label>Profilio nuotrauka:</label><br/>
				      <input type="file" name="edit-player-photo" id="file" class="inputfile" accept="image/*" />
				      <label for="file">
				      <i class="fa fa-cloud-upload"></i>
				      Įkelti nuotrauką</label>
				      <br/>
				      <span id="file_upload"></span>
				      <div id="files_names"></div>
				    </div>
			    </div>
                @endif

	  <button type="submit" class="btn btn-primary form-control">Redaguoti</button>

	</form>
</div>	

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#editLeagueForm #file").change(function() {
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#file_upload").text(fileName);
  });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
    $("#file").change(function(){

        //console.log($(this)[0]);
        $("#files_names")/*.html("<p>Selected file name: </p>").append($(this)[0].files[0].name)*/.append("<br>").append("<div class='user-edit-image'><img></div>");
        readURL($(this)[0], "#files_names img");
        //$(".files_names").html("Selected file name: ").append($(this)[0].files[0].name).append("<img src='"+$(this)[0].files[0].name+"'>");
    });

});

function readURL(input, img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(img).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

</script>

@endsection


