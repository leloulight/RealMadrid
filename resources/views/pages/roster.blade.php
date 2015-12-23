@extends('layout')

@section('content')

@foreach($players_list as $key => $group)
	<h3 class="text-center col-md-12">
		@if($key == 'GK')
			Vartininkai :
		@elseif($key == 'DEF')
			Gynėjai :
		@elseif($key == 'MID')
			Saugai :
		@elseif($key == 'ST')
			Puolėjai :
		@endif
	</h3>
	<ul class="col-md-12" style="list-style:none;">
	@foreach($group as $player)
		<li class="col-md-3" style="list-style:none;padding: 5px;height:300px;">
			<div title="{!! $player->player_name." ".$player->last_name !!}" style="background-image:url('/{!! $player->player_photo !!}');width:100%;height:250px;background-size:cover;"></div>
			<div class="text-center">
			<span style="font-size:20px;"><strong>#{!! $player->player_number !!}</strong></span>
			<span style="font-size:20px;">{!! $player->player_name." ".$player->last_name !!}</span>
			</div>
		</li>
	@endforeach
	</ul>
	<hr class="col-md-12">
@endforeach
@endsection