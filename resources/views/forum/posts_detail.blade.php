@extends('forum')

@section('forum_content')
<div class="col-md-10 col-md-offset-1">

	<div class="panel panel-default">
				<div class="panel-heading forum-posts-wrap">
					<h3 class="panel-title pull-left"> 
						Forum post detail title 
					</h3><br/>
					
				</div>
				<div class="panel-body">
				<ul style="list-style:none" class="no-padding-left no-padding-right">

					<li class="col-md-12" style="border-bottom:1px dashed grey;margin:2% 0;">

						<div class="col-md-2">
							<img src="/images/users/me.jpg" width="70px;">
							<br/>
							<a href="/users">Marius Geciauskas</a>
							<p>Administratorius</p>
							<p>Atsakymu : 541</p>
						</div>
						
						<div class="col-md-10 forum-post-detail-comment">
							<p class="text-right">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>

							<article style="padding:1%;">

								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?
								 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?
								 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?
								 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?
							</article>

							<figure class="forum-post-detail-comment-image">
							<img src="https://scontent-waw1-1.xx.fbcdn.net/hphotos-xta1/v/t1.0-9/12141798_10150925385009953_9160019141320593809_n.jpg?oh=475c488c916467e771edc7a62f4bfc99&oe=56A60E67">
							</figure>


							<figure class="forum-post-detail-comment-image">
							<img src="https://scontent-waw1-1.xx.fbcdn.net/hphotos-xat1/v/t1.0-9/12105906_10150925386314953_2472772383963926184_n.jpg?oh=8886fd77c8aec73e6d6db7478fbc2ca8&oe=56CF9BCF">
							</figure>
	
						</div>

						<div class="col-md-12 forum-post-detail-comment-bottom">
							<div class="pull-left">
								<span class="comment-like"><i class="fa fa-plus">0</i></span>
								<span class="comment-bomb"><i class="fa fa-bomb">0</i></span>
							</div>
							<div class="pull-right">
								<span class="comment-answer"><i class="fa fa-quote-left">Cituoti</i></span>&nbsp;
								<span class="comment-answer"><i class="fa fa-share">Atsakyti</i></span>
							</div>
						</div>

					</li>


					<li class="col-md-12" style="border-bottom:1px dashed grey;margin:2% 0;">

						<div class="col-md-3">
							<img src="/images/users/me.jpg" width="70px;">
							<br/>
							<a href="/users">Marius Geciauskas</a>
							<p>Administratorius</p>
							<p>Atsakymu : 541</p>
						</div>
						
						<div class="col-md-9 forum-post-detail-comment">
							<p class="text-right">{!! \Carbon\Carbon::now()->diffForHumans() !!}</p>

							
							<figure class="forum-post-detail-comment-quote">
								<blockquote style="background-color:#eee;">
								<p>Real Madrid have scored 20 goals and conceded one this season.</p>
								<h6 class="text-right">Username Userlastname</h6>
								</blockquote>
							</figure>

							<article style="padding:0 0 2% 0;">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?
								 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?
								 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?
								 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam quas, hic adipisci quis blanditiis. 
								Praesentium obcaecati, totam rem dolor quisquam, earum, harum deserunt,
								 libero consequuntur eaque officiis veniam pariatur ipsum?

							</article>

							
							
						</div>
						<div class="col-md-12 forum-post-detail-comment-bottom">
							<div class="pull-left">
								<span class="comment-like"><i class="fa fa-plus">0</i></span>
								<span class="comment-bomb"><i class="fa fa-bomb">0</i></span>
							</div>
							<div class="pull-right">
								<span class="comment-answer"><i class="fa fa-quote-left">Cituoti</i></span>&nbsp;
								<span class="comment-answer"><i class="fa fa-share">Atsakyti</i></span>
							</div>
						</div>
					</li>

					

				
				</ul>					
				</div>
	</div>

@endsection