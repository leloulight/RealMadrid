<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>
	@yield('title') Real Madrid C.F. Lietuvos fanų bendruomenė
	 </title>
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/styles.css"> 
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

	<style type="text/css">
#defaultCountdown { width: 240px; height: 20px; color:#fff;}
</style>

	<script>
	function getVoting(data){
		var html = $(".poll").html("");
		if(!data.voted){
			var form = $("<form/>").attr("method", "POST").attr("action", "/apklausa/rezultatai").attr("id", "pollForm").append(
					$("<input/>").attr("type", "hidden").attr("name", "_token").val( "{!! csrf_token() !!}")
				).append(
					$("<input/>").attr("type", "hidden").attr("name", "poll_id").val(data.poll.id)
				);
			$.each(data.poll_results, function(key, value){
				form.append(
					$("<div/>").addClass("form-group").append(
						$("<input/>").attr("type", "radio").attr("name", "answer_id").attr("id", "answer_id_"+value.id).val(value.id)
					).append(
						$("<label/>").attr("for", "answer_id_"+value.id).append($("<span/>")).append(value.answer)
					)
				);
			})
		}
		html.append($("<h5/>").addClass("text-center").text(data.poll.question)).append(form);
		$.each(data.poll_results, function(key, value) {
      	 	var rez = parseInt(value.answer_count * 100 / data.answer_sum);
      	 	html.append(value.answer+'<div class="progress"><div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'+rez+'" aria-valuemin="0" aria-valuemax="100" style="width: '+rez+'%;"> '+rez+'% </div>');
      	});
		
	}
	$(document).ready(function(){
		$.ajax({
			type: "POST",
			url: "/apklausa/getresults",
			data: {_token: "{!! csrf_token() !!}" },
			success: function(data){
				getVoting(data);
			}

		});
	});
		function showMessage(title, message, type){
			swal({   
			    title: title,   
			    text: message,   
			    type: type,   
			    timer:1500,
			    showConfirmButton:false
			});
		}
	</script>

</head>
<body>
{!! \Carbon\Carbon::setLocale('lt'); !!}
<div class="loading-gif"></div>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/lt_LT/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="container-fluid header-fixtures-wrap">

		<div class="header-fixtures">
		@if(count($fixtures) > 0)
			<span>Artimiausios varžybos :</span>
			<span>{!! $fixtures->league_title !!} |</span>
			<span>{!! \Carbon\Carbon::parse($fixtures->fixture_date)->format('Y-m-d H:i')  !!} |</span>
			<span>
				<img src="{!! $fixtures->team1_logo_path.$fixtures->team1_logo_name !!}">
				:
				<img src="{!! $fixtures->team2_logo_path.$fixtures->team2_logo_name !!}"></span>
			<span>Liko : <span id="countdown"></span></span>
			<span id="fixtureOn">Vyksta rungtynės!</span>
			@else
			<span>Rungtynių nėra</span>
			@endif
		</div>

	</div>
	@include('partials.nav')
	<div class="container col-md-12">

		<div class="col-md-9 content">
			<h3 class="page-header-title">
				<img src="/images/images/header_logo.png" />
				&nbsp;
				<span style="vertical-align: -webkit-baseline-middle;" >Real Madrid C.F. fanų bendruomenė Lietuvoje</span>
			</h3>
			
			@yield('content')

		</div>

		<div class="col-md-3 sidebar">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> <i class="fa fa-bar-chart"></i>
						Statistika
						<img src="/images/leagues/la_liga.png" width="" height="20">
					</h3>
				</div>
				<div class="panel-body statistics">
					<div class="table-responsive">
					  <table class="table table-striped">
        <thead>
          <tr>
            <th>Įmušta</th>
            <th>Praleista</th>
            <th>+ / -</th>
            <th>Vieta</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          	<td>55</td>
            <td>20</td>
            <td>35</td>
            <td class="text-center">II</td>      
          </tr>
        </tbody>
      </table>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-futbol-o"></i>
						Paskutinės rungtynės
					</h3>
				</div>
				<div class="panel-body last-games">
					
					<div class="col-md-12 no-padding-right no-padding-left latest-fixture-date">
					<span class="pull-left col-md-6 no-padding-right">{!! $latestFixtures->stadium_title !!}</span>
					<span class="pull-right col-md-6 no-padding-left">{!! \Carbon\Carbon::parse($latestFixtures->fixture_date)->format('Y-m-d H:i')  !!}</span>
					</div>
					<div class="col-md-12 no-padding-right no-padding-left latest-fixture-league">
					<span class="text-center col-md-12 no-padding-right no-padding-left">{!! $latestFixtures->league_title !!}
					<img src="{!! $latestFixtures->league_logo_path.$latestFixtures->league_logo_name !!}" title="{!! $latestFixtures->league_title !!}" width="" height="20">
					</span>
					</div>
					<div class="col-md-12 latest-fixture-score">
						<span class="col-md-10 pull-left no-padding-right no-padding-left">{!! $latestFixtures->team1_title !!} <img src="{!! $latestFixtures->team1_logo_path.$latestFixtures->team1_logo_name !!}" width="20" height="20" title="{!! $latestFixtures->team1_title !!}"></span>
						<span class="col-md-2"><h4 style="margin-top:0 !important;">{!! $latestFixtures->team1_score !!}</h4></span>

						<span class="col-md-10 pull-left no-padding-right no-padding-left">{!! $latestFixtures->team2_title !!} <img src="{!! $latestFixtures->team2_logo_path.$latestFixtures->team2_logo_name !!}" width="20" height="20" title="{!! $latestFixtures->team2_title !!}"></span>
						<span class="col-md-2"><h4 style="margin-top:0 !important;">{!! $latestFixtures->team2_score !!}</h4></span>	
					</div>
				</div>
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"> <i class="fa fa-calendar"></i>
						Kalendorius
					</h3>
				</div>
				<div class="panel-body">
					<ul class="col-md-12 calendar-content no-padding-right no-padding-left">
					@foreach($calendar_items as $calendar)
						<li class="col-md-12 no-padding-right no-padding-left calendar-list">
							<div class="col-md-12  calendar-date">
								<span class="pull-left col-md-6 no-padding-right">{!! $calendar->stadium_title !!}</span>
								<span class="pull-right col-md-6 no-padding-left">{!! \Carbon\Carbon::parse($calendar->fixture_date)->format('Y-m-d H:i')  !!}</span>
							</div>
							<div class="col-md-12 no-padding-right no-padding-left calendar-league">
							<span class="text-center col-md-12 no-padding-right no-padding-left">{!! $calendar->league_title !!}
							<img src="{!! $calendar->league_logo_path.$calendar->league_logo_name !!}" title="{!! $calendar->league_title !!}" width="20">
							</span>
							</div>
							<div class="col-md-12 no-padding-right no-padding-left calendar-teams">
								<span class="pull-left col-md-5 no-padding-right no-padding-left text-right">
									{!! $calendar->team1_title !!}
									<img src="{!! $calendar->team1_logo_path.$calendar->team1_logo_name !!}" title="{!! $calendar->team1_title !!}" width="20" height="20"></span>
									<span class="col-md-2 pull-left text-center"> : </span>
								<span class="pull-left col-md-5 no-padding-right no-padding-left text-left" >
								<img src="{!! $calendar->team2_logo_path.$calendar->team2_logo_name !!}" title="{!! $calendar->team2_title !!}" width="20" height="20">
									{!! $calendar->team2_title !!}
									</span>
							</div>
							
						</li>
						@endforeach
	
					</ul>

				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-clock-o"></i>
						Rezultatyviausi žaidėjai
					</h3>
				</div>
				<div class="panel-body">
					<div class="top-scorers">

					<div class="table-responsive">
					  <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Žaidėjas</th>
            <th>Įvarčiai</th>
            <th>Rez.perd.</th>
          </tr>
        </thead>
        <tbody>
         {{--*/ $i = 0 /*--}}
        @foreach($statistics as $player_stat)
         {{--*/ $i++ /*--}}
          <tr>
            <th scope="row">{!! $i !!}</th>
            <td>{!! $player_stat->player_name.' '.$player_stat->player_lastname !!}</td>
            <td>{!! $player_stat->player_goals !!}</td>
            <td>{!! $player_stat->player_assists !!}</td>      
          </tr>

          @endforeach
        </tbody>
      </table>
					</div>

					</div>
				</div>
			</div>

			<div class="fb-page" data-href="https://www.facebook.com/realfanai" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
				<div class="fb-xfbml-parse-ignore">
					<blockquote cite="https://www.facebook.com/realfanai">
						<a href="https://www.facebook.com/realfanai">Real Madrid C.F. Lietuvos fanų bendruomenė</a>
					</blockquote>
				</div>
			</div>

			<a class="twitter-timeline" href="https://twitter.com/realmadrid" data-widget-id="567751864780095488">Tweets by @realmadrid</a>
			<script>
        !function(d,s,id){
        	var js,fjs=d.getElementsByTagName(s)[0],
        	p=/^http:/.test(d.location)?'http':'https';
        	if(!d.getElementById(id)){js=d.createElement(s);
        		js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
        		fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        </script>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-question"></i>
						Apklausa
					</h3>
				</div>
				<div class="panel-body">
					<div class="poll">
						@foreach($polls as $poll)
						<h5 class="text-center">{!! $poll->question !!}</h5>
						<form method="POST" action="/apklausa/rezultatai" id="pollForm">
						{{ csrf_field() }}
						<input type="hidden" name="poll_id" value="{!! $poll->id !!}"> 
							@foreach($poll->answers as $answer)
								<div class="form-group">
									<input type="radio" name="answer_id" id="answer_id_{!! $answer->id !!}" value="{!! $answer->id !!}">
									<label for="answer_id_{!! $answer->id !!}"><span></span>{!! $answer->answer !!}</label>
								</div>
							@endforeach
						</form>
						@endforeach
						<div class="poll-results"></div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-futbol-o"></i>
						Įdomus faktas
					</h3>
				</div>
				<div class="panel-body">
					<div class="">
						In the first few years of this new decade three trophies were added to the cabinet by José Mourinho's Real Madrid.
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="col-md-12 pre-footer">
		<div class="trophies">
			<ul>
				<li></li>
			</ul>
		</div>
	</div>

<footer class="footer col-md-12">
	<div class="footer-info">
		<ul class="list-inline">
		<li><a href="" data-toggle="modal" data-target="#myModal" style="vertical-align:middle;">Reklama</a></li>
			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Reklama mūsų tinklapyje</h4>
			      </div>
			      <div class="modal-body">
			        <p>Lorem ipsum</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
			      </div>
			    </div>

			  </div>
			</div>
		<li><a href="" data-toggle="modal" data-target="#myModal2" style="vertical-align:middle;">Parama</a></li>
		<!-- Modal -->
			<div id="myModal2" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Paremkite mus!</h4>
			      </div>
			      <div class="modal-body">
			        <p>Parama mūsų tinklapiui</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
			      </div>
			    </div>

			  </div>
			</div>

			<li><a href="" data-toggle="modal" data-target="#myModalDisclaimer" style="vertical-align:middle;">Disclaimer</a></li>
			<!-- Modal -->
			<div id="myModalDisclaimer" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Disclaimer</h4>
			      </div>
			      <div class="modal-body">
			        <p>Lorem ipsum</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
			      </div>
			    </div>

			  </div>
			</div>
		</ul>
	</div>
</footer>

<div id="scrollTop">▲</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>

<script type="text/javascript">

	$(document).on("click", "#pollForm input[type=radio]", function(e){ 
	    $.ajax( {
			type: "POST",
			url: "/apklausa/rezultatai",
			data: $("#pollForm").serialize(),
			success: function(data) {
				getVoting(data);
			} 
		});
    });
</script>


<script type="text/javascript">
    function countDown(date){
    	var now = new Date();

		var timeDiff = date.getTime() - now.getTime();
		if (timeDiff <= 0) { timeDiff = 0; } 
	    
		var diffDays = Math.floor(timeDiff / (1000 * 3600 * 24));

		var diffHours_tmp = timeDiff - diffDays * 1000 * 3600 * 24; 
			diffHours = Math.floor(diffHours_tmp / (1000 * 3600)); 

		var diffMinutes_tmp = diffHours_tmp - diffHours * 1000*60*60; 
			diffMinutes = Math.floor(diffMinutes_tmp / (1000 * 60)); 

		var diffSeconds = diffMinutes_tmp - diffMinutes*1000*60; 
			diffSeconds = Math.floor(diffSeconds / (1000)); 

		return {time: timeDiff, days: diffDays, hours: diffHours, minutes: diffMinutes, seconds: diffSeconds}
    }

	    var date = '{!! $fixtures->fixture_date !!}';
	  
		//date = date.toString().replace('-', '/');

		var re = new RegExp('-', 'g');

		date = date.replace(re, '/');

	var timestamp = new Date(date);

	var timer = setInterval(function () {
    var count = countDown(timestamp);
  	
  	$('#countdown').text(count.days+'d:'+count.hours+'h:'+count.minutes+'m:'+count.seconds+'s');
    
    var now = new Date();
    var then = now.getFullYear()+'/'+(now.getMonth()+1)+'/'+now.getDate()+' '+now.getHours()+':'+now.getMinutes()+':'+now.getSeconds(); 
    now = new Date(then);

    if (timestamp.getTime() == now.getTime()) {
  	  	$.playSound('/sounds/whistle');
  	};
  //	if(timestamp >= now){
    if (count.time <= 0) {
    	$("#fixtureOn").show(500);
    	clearInterval(timer); 
 		}
 	//}

 	var c = true;
		setInterval(function (){
		if(c){
		color = "green";
		c = false;
		}else{
		  color ="red";
		c = true;
		}
		$("#fixtureOn").css('background-color', color);

		},1000);

}, 1000);

		
</script>
<script type="text/javascript">
	$(document).ready(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop()>200){
			$('#scrollTop').fadeIn(200);
		} else {
			$('#scrollTop').fadeOut(200);
		}
	});
	$('#scrollTop').click(function(){
		
		$('html, body').animate({ scrollTop: 0}, 1000);
	
	});
});
</script>
<script type="text/javascript">
		$(window).load(function() {
		// Animate loader off screen
		$(".loading-gif").fadeOut("slow");
	});
</script>

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
<script type="text/javascript">
    window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":"/cookie-policy","theme":"light-bottom"};
</script>

<script type="text/javascript" src="//s3.amazonaws.com/cc.silktide.com/cookieconsent.latest.min.js"></script>
<!-- End Cookie Consent plugin -->



@include ('flash')

</body>
</html>