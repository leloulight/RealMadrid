@extends('layout')

@section('content')
<div>
	<div class="col-md-12">
		<ul class="list-inline posts-list">
				<h3 class="text-center">Įrašai pagal gairę : {!! $slug !!}</h3>
				@foreach($tagPosts as $post)
				<li class="small-post col-md-6">
				<a href="/irasai/{!! $post->category->slug !!}/{!! $post->slug !!}">
					<div class="post">
						<div class="small-post-photo">
							{{--*/ $photo = $post->photos->first() /*--}}
							<div class="small-post-image" style="background-image:url('/{!! $photo->path.$photo->name !!}');"></div>
							<div class="post-text">
								<strong>
									<a href="/kategorija/{!! $post->category->slug !!}">
										{!! $post->category->title !!}
									</a>	
								</strong>
								<h4>
									<a href="/irasai/{!! $post->category->slug !!}/{!! $post->slug !!}">
										{!! $post->title !!}
										({!! (count($post->comments)) !!})
									</a>
								</h4>
								<p>{!! $post->excerpt !!}</p>
							</div>
						</div>	
					</div>
					</a>
				</li>
				@endforeach

				
		</ul>
	</div>
</div>

@endsection