@extends('layout')

@section('title')
Santiago bernabeu | 
@endsection

@section('content')
<div class="col-md-12">

	<div style="background-image:url('/{!! $santiago->photo_path.$santiago->photo_name !!}');width:100%;height:300px;background-size:cover;background-position:center center;"></div>

	
	<div class="col-md-4">
		<div class="stadium-info">
		<h5>Atidarytas</h5>
		<p>{!! $santiago->opening !!}</p>
		</div>
		<div class="stadium-info">
		<h5>Dydis</h5>
		<p>{!! $santiago->dimensions !!}</p>
		</div>
		<div class="stadium-info">
		<h5>Adresas</h5>
		<p>{!! $santiago->address !!}</p>
		</div>
		<div class="stadium-info">
		<h5>Žiūrovų skaičius</h5>
		<p>{!! $santiago->capacity !!}</p>
		</div>
	</div>

	<div class="col-md-8">
		<h4 class="text-center">Aprašymas</h4>
		<p>{!! $santiago->description !!}</p>
	</div>
	
</div>
@endsection