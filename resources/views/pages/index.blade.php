@extends('layout')

@section('content')
	<ul class="posts-list">

		{{--*/ $i = 0 /*--}}
		@for($i; $i < 6; $i++ )
			@if($i == 0)
				
				<li class="big-post col-md-12">
				<a href="/irasai/{!! $posts[$i]->category->slug !!}/{!! $posts[$i]->slug !!}">
					<div class="post">
						<div class="post-photo">
							{{--*/ $photo = $posts[$i]->photos->first() /*--}}
							@if($photo)
							<div class="biggest-post-image" style="background-image:url('/{!! $photo->path.$photo->name !!}');"></div> 	
								<!--<img src="{!! $photo->path.$photo->name !!}" alt="">-->
							@endif
							<div class="post-text">
								<strong>{!! $posts[$i]->category->title !!}</strong>
								<p><em></em></p> 
								<h3>{!! $posts[$i]->title !!}</h3>
								<p>{!! $posts[$i]->excerpt !!}</p>
							</div>
						</div>
						
					</div>
					</a>
				</li>
				
			@elseif($i >= 1 && $i <= 2  )
				<li class="small-post col-md-6">
				<a href="/irasai/{!! $posts[$i]->category->slug !!}/{!! $posts[$i]->slug !!}">
					<div class="post">
						<div class="small-post-photo">
							{{--*/ $photo = $posts[$i]->photos->first() /*--}}
							@if($photo)
							<div class="small-post-background" style="background-image:url('{!! $photo->path.$photo->name !!}');background-size:cover;"></div>
								<!--<img src="{!! $photo->path.$photo->name !!}" alt="">-->
							@endif
							<div class="post-text">
								<strong>
									<a href="/kategorija/{!! $posts[$i]->category->slug !!}">
										{!! $posts[$i]->category->title !!}
									</a>	
								</strong>
								<h4>
									<a href="/irasai/{!! $posts[$i]->category->slug !!}/{!! $posts[$i]->slug !!}">
										{!! $posts[$i]->title !!}
									</a>
								</h4>
								<p>{!! $posts[$i]->excerpt !!}</p>
							</div>
						</div>	
					</div>
					</a>
				</li>
			@else
				<li class="smallest-post col-md-4">
				
					<div class="post">
						<div class="smallest-post-photo">

							{{--*/ $photo = $posts[$i]->photos->first() /*--}}
							@if($photo)
							<a href="/irasai/{!! $posts[$i]->category->slug !!}/{!! $posts[$i]->slug !!}">
								<div class="smallest-post-image" style="background-image:url('/{!! $photo->path.$photo->name !!}');"></div>
								<!--<img src="{!! $photo->path.$photo->name !!}" alt="">-->
							</a>
							@endif
							
						</div>
						
						<h5 class="small-post-link">
						<a href="/irasai/{!! $posts[$i]->category->slug !!}/{!! $posts[$i]->slug !!}">
							{!! $posts[$i]->title !!}
						</a>
					</h5>

					</div>
					
				</li>
			@endif
		@endfor
	</ul>
	<div class="col-md-12 other-news">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"> 
					<i class="fa fa-newspaper-o"></i>
					Kitos naujienos
				</h3>
			</div>
			<div class="panel-body">
				@for($i; $i < count($posts); $i++)
					<div class="other-news-wrap">
						<div class="col-md-2">
							{{--*/ $photo = $posts[$i]->photos->first() /*--}}
							<a href="/irasai/{!! $posts[$i]->category->slug !!}/{!! $posts[$i]->slug !!}">
							<div class="other-news-image" style="background-image:url('/{!! $photo->path.$photo->name !!}');"></div>
								</a>
						</div>
						<div class="col-md-10">
							<span class="smallest-post-title">
								<a href="/irasai/{!! $posts[$i]->category->slug !!}/{!! $posts[$i]->slug !!}">
								{!! $posts[$i]->title !!}</a>
							</span>
							<span class="pull-right">{!! $posts[$i]->created_at->diffForHumans() !!}</span>
							<p>{!! $posts[$i]->body !!}</p> 
						</div>
					</div>
				@endfor
			</div>
		</div>
	</div>
		
	<div class="col-md-12">
		<div class="all-news">
		<a href="/naujienos/visos" class="">Visos naujienos!</a>
		</div>
	</div>
@endsection