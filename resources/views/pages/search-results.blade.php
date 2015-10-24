@extends('layout')

@section('content')
<div>
	<div class="col-md-12">
	<h3 class="text-center">Paieškos rezultatai pagal : {!! $search !!}</h3>
	@if(count($posts) > 0 || count($categories) > 0 || count($tags) > 0 )
		<ul class="search col-md-4 col-sm-12">
			@if(count($posts) > 0)
				<h4 class="">Įrašai :</h4>
				@foreach($posts as $post)
				<li class="col-md-12">
				<i class="fa fa-file-text-o"></i> <a href="/irasai/{!! $post->category->slug !!}/{!! $post->slug !!}">
				{!! $post->title !!}</a>
				</li>
				@endforeach	
			@endif
		</ul>
		<ul class="search col-md-4 col-sm-12">
			@if(count($categories) > 0)
				<h4 class="">Kategorijos :</h4>
				@foreach($categories as $category)
				<li class="col-md-12">
				<i class="fa fa-folder-open"></i> <a href="/kategorija/{!! $category->slug !!}/">
				{!! $category->title !!}</a>
				</li>
				@endforeach	
			@endif	
		</ul>
		<ul class="search col-md-4 col-sm-12">
			@if(count($tags) > 0)
				<h4 class="">Gairės :</h4>
				@foreach($tags as $tag)
				<li class="col-md-12">
				<i class="fa fa-tags"></i> <a href="/gaires/{!! $tag->slug !!}/">
				{!! $tag->title !!}</a>
				</li>
				@endforeach		
			@endif
		</ul>
		@else
		<h3 class="text-center">Nebuvo rasta jokių rezultatų pagal užklausą : {!! $search !!}. Patikslinkite užklausą ir bandykite dar</h3>
		@endif
	</div>
</div>

@endsection