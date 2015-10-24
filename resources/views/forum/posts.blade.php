@extends('forum')

@section('forum_content')
<div class="col-md-12">

	<div class="panel panel-default">
				<div class="panel-heading forum-posts-wrap">
					<h3 class="panel-title pull-left"> 
						Forum post title
					</h3><br/>
					<h5>Forum post title description</h5>
				</div>
				<div class="panel-body forum-posts-list-wrap">
				<ul style="list-style:none" class="no-padding-left no-padding-right">

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
						<button class="btn btn-forum">Atsakymų : 15</button>
						</div>
						
						<div class="col-md-3 forum-posts-list-author">
							<img src="/images/users/me.jpg" height="50px" style="border-radius:50px">
							<a href="/users/">Marius Gečiauskas</a>
							<p class="text-center">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>
						</div>
					</li>

					<li class="col-md-12 forum-posts-list" style="">
						<div class="col-md-6 forum-posts-list-title">
							<h4>Forum post title</h4>
							<p>Forum post description</p>
						</div>
					

						<div class="col-md-3 forum-posts-list-answers detail-posts-list">
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

@endsection