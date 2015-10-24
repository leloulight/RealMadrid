@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-10 col-md-offset-1">

<h3 class="text-center"> : </h3>

  <form action="/dashboard/players/statistics" method="POST">

	{!! csrf_field() !!}


	<div class="form-group">
    <label for="player_id">Žaidėjas :</label>
		<em><a  class="" data-toggle="modal" data-target="#myPlayerModal">(Sukurti naują žaidėją)</a></em>
		<select name="player_id" id="player_id" class="form-control" >
    @foreach($players as $player)
    <option value="{!! $player->id !!}">{!! $player->name. ' ' .$player->lastname !!}</option>
    @endforeach
		</select>
    </div>

    <div class="form-group">
      <label for="player_goals">Žaidėjo įvarčiai</label>
      <input type="number" name="player_goals" class="form-control" />
    </div>

    <div class="form-group">
      <label for="player_assists">Žaidėjo rezultatyvūs perdavimai</label>
      <input type="number" name="player_assists" class="form-control"/>
    </div>


    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control" id="submit-all">Pridėti statistiką</button>
    </div>
	
    </form>
</div>

@endsection