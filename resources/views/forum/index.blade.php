@extends('forum')

@section('forum_content')


<div class="col-md-9">

	<div class="panel panel-default">
				<div class="panel-heading forum-categories">
					<h1 class="panel-title pull-left"> 
						Real Madrid C.F.
					</h1>
					<i class="fa fa-minus pull-right fa-3 showForumPosts" id="showForumPosts" title="Uždaryti"></i>
				</div>
				<div class="panel-body forum-posts-list-wrap">
				<ul style="list-style:none" class="no-padding-left no-padding-right">

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-5 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
						<div class="col-md-2 forum-posts-list-subjects">
						<button class="btn btn-forum">Temų : 15</button>
						</div>

						<div class="col-md-2 forum-posts-list-answers">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-5 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
						<div class="col-md-2 forum-posts-list-subjects">
						<button class="btn btn-forum">Temų : 15</button>
						</div>

						<div class="col-md-2 forum-posts-list-answers">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

				
				</ul>					
				</div>
	</div>


<div class="panel panel-default">
				<div class="panel-heading forum-categories">
					<h1 class="panel-title pull-left"> 
						Real Madrid C.F.
					</h1>
					<i class="fa fa-minus pull-right fa-3 showForumPosts" id="showForumPosts" title="Uždaryti"></i>
				</div>
				<div class="panel-body forum-posts-list-wrap">
				<ul style="list-style:none" class="no-padding-left no-padding-right">

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-5 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
						<div class="col-md-2 forum-posts-list-subjects">
						<button class="btn btn-forum">Temų : 15</button>
						</div>

						<div class="col-md-2 forum-posts-list-answers">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-5 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
						<div class="col-md-2 forum-posts-list-subjects">
						<button class="btn btn-forum">Temų : 15</button>
						</div>

						<div class="col-md-2 forum-posts-list-answers">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

				
				</ul>					
				</div>
	</div>
	

	<div class="panel panel-default">
				<div class="panel-heading forum-categories">
					<h1 class="panel-title pull-left"> 
						Forumo kategorijos
					</h1>
					<i class="fa fa-plus pull-right fa-3" id="showForumPosts"></i>
				</div>
				<div class="panel-body">

					
				</div>
	</div>

	<div class="panel panel-default">
				<div class="panel-heading forum-categories">
					<h1 class="panel-title pull-left"> 
						Forumo kategorijos
					</h1>
					<i class="fa fa-plus pull-right fa-3" id="showForumPosts"></i>
				</div>
				<div class="panel-body">

					
				</div>
	</div>

</div>

<div class="col-md-3">
		
			
			<h4 class="">Naujausi įrašai</h4>
            <ul class="col-md-12 no-list">
            	<li class="col-md-12">
            		<a href="">Ha ha ha ha </a>
            	</li>
            	<li class="col-md-12">
            		<a href="">Ha ha ha ha </a>
            	</li>
            	<li class="col-md-12">
            		<a href="">Ha ha ha ha </a>
            	</li>
            </ul>
            <h4 class="">Forumo lyderiai</h4>
            <ul class="col-md-12 no-list">
            	<li class="col-md-12">
            		<a href="">Tomas </a>
            	</li>
            	<li class="col-md-12">
            		<a href="">Vycka </a>
            	</li>
            	<li class="col-md-12">
            		<a href="">Belekas </a>
            	</li>
            </ul>
</div>

@endsection