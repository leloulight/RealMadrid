@extends('admin')

@section('admin_content')

@include('admin.fixtures.modals')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-10 col-md-offset-1">

<h3 class="text-center">Rungtynės : </h3>

  <form action="/dashboard/fixtures" method="POST">

	{!! csrf_field() !!}


	<div class="form-group">
		{!! Form::label('league_id','Lyga : ') !!} 
		<em><a  class="create-modal" data-toggle="modal" data-target="#myfixturesLeagueModal">(Sukurti naują lygą)</a></em>
		<select name="league_id" id="league_id" class="form-control" >
    @foreach($leagues as $league)
    <option value="{!! $league->id !!}">{!! $league->title !!}</option>
    @endforeach
		</select>
    </div>

    <div class="form-group">
    {!! Form::label('stadium_id','Stadionas : ') !!} 
    <em><a  class="create-modal" data-toggle="modal" data-target="#myfixturesStadiumModal">(Sukurti naują stadioną)</a></em>
    <select name="stadium_id" id="stadium_id" class="form-control" >
    @foreach($stadiums as $stadium)
    <option value="{!! $stadium->id !!}">{!! $stadium->title !!}</option>
    @endforeach
    </select>
    </div>

    <div class="form-group">
    {!! Form::label('team_1_id','Namų komanda : ') !!} 
    <em><a  class="create-modal" data-toggle="modal" data-target="#myfixturesTeamModal">(Sukurti naują komandą)</a></em>
    <select name="team_1_id" id="team_1_id" class="form-control" >
    @foreach($teams as $team)
    <option value="{!! $team->id !!}">{!! $team->title !!}</option>
    @endforeach
    </select>
    </div>

    <div class="form-group">
    {!! Form::label('team_2_id','Išvykos komanda : ') !!} 
    <em><a  class="create-modal" data-toggle="modal" data-target="#myfixturesTeamModal">(Sukurti naują komandą)</a></em>
    <select name="team_2_id" id="team_2_id" class="form-control" >
    @foreach($teams as $team)
    <option value="{!! $team->id !!}">{!! $team->title !!}</option>
    @endforeach
    </select>
    </div>

    <div class="form-group">
      <label for="team_1_score">Pirmos komandos įvarčiai</label>
      <input type="number" name="team_1_score" class="form-control" value="0" />
    </div>

    <div class="form-group">
      <label for="team_2_score">Antros komandos įvarčiai</label>
      <input type="number" name="team_2_score" class="form-control" value="0" />
    </div>

    <div class="form-group">
      <label for="dtp_input1" class="control-label">Rungtynių data</label>
      <div class="input-group date form_datetime " data-date="{!! \Carbon\Carbon::parse(\Carbon\Carbon::now())->format('Y-m-d')  !!}" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
          <input class="form-control" name="fixture_date" size="16" type="text" value="" readonly="">
          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"> 
          </span>
          </span>

          <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
          </span>
                </div>
        <input type="hidden" id="dtp_input1" value=""><br>
            </div>

    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control" id="submit-all">Pridėti rungtynes</button>
    </div>
	
    </form>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
     $(document).on("change", "#leaguefixtureFormUpload #file", function(){
      console.log("pirmas");
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#file_upload").text(fileName);
     });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $(document).on("change", "#teamfixtureFormUpload #team_logo", function(e){
    console.log("antras");
    var teamLogo = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#team_logo_upload").text(teamLogo);
  });
  });
</script>



@endsection