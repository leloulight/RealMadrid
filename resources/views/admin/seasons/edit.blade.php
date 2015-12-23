@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-8 col-md-offset-2">

<h3 class="text-center">Redaguoti sezoną : </h3>

  <form method="POST" action="/dashboard/seasons/{!! $season->id !!}/redaguoti" id="seasonsFormUpload" enctype="multipart/form-data">

	{!! csrf_field() !!}

    <div class="form-group">
    <label for="season_title">Sezonas :</label>
    <input type="text" name="season_title" id="season_title" class="form-control" value="{!! $season->title !!}" />
    </div>

    <div class="form-group">
    <label for="position">Pozicija :</label>
      <select name="position" class="form-control">
        <option value="1">Pirmas</option>
        <option value="2">Antras</option>
        <option value="3">Trečias</option>
        <option value="4">Ketvirtas</option>
        <option value="5">Penktas</option>
        <option value="6">Šeštas</option>
        <option value="7">Septintas</option>
        <option value="8">Aštuntas</option>
        <option value="9">Devintas</option>
        <option value="10">Dešimtas</option>
        <option value="11">Vienuoliktas</option>
        <option value="12">Dvyliktas</option>
        <option value="13">Tryliktas</option>
        <option value="14">Keturiokliktas</option>
        <option value="15">Penkioliktas</option>
        <option value="16">Šešioliktas</option>
        <option value="17">Septynioliktas</option>
        <option value="18">Aštuonioliktas</option>
        <option value="19">Devynioliktas</option>
        <option value="20">Dvidešimtas</option>
      </select>
    </div>
 
    <div class="form-group">
    <button type="submit" class="btn btn-primary form-control">Redaguoti sezoną</button>
    </div>
	
   </form>
</div>


@endsection