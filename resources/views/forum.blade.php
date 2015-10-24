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

	<style type="text/css">
#defaultCountdown { width: 240px; height: 20px; color:#fff;}
</style>


	<script>
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
	<script>
		function createComment(img, user, date, comment, like, bomb){
    	var comment = 
    		$("<div/>").addClass("comment-wrap").append(
    			$("<div/>").addClass("comments_header").append(
    				$("<div/>").addClass("pull-left").append(
    					$("<img/>").attr("src", img).attr("style", "border-radius: 50px; width: 30px")
    				).append(
    					$("<em/>").html(user)
    				)
    			).append(
    				$("<div/>").addClass("pull-right").html(date)
    			)
    		).append(
    			$("<div/>").addClass("comments-body").append(
    				$("<div/>").addClass('col-md-12').addClass('col-sm-10').append(
    					$("<p/>").html(comment)
    				).append(
    					$("<div/>").addClass('pull-left').addClass('comment-like').append(
    						$("<i/>").addClass('fa').addClass('fa-plus')
    					).append(like)  					
    				).append(
    					$("<div/>").addClass('pull-right').addClass('comment-bomb').append(
    						$("<i/>").addClass('fa').addClass('fa-bomb')
    					).append(bomb)
    				).append(
    					$("<span/>").addClass('pull-right').attr("id", "comment-answer").text("Atsakyti")  					
    				)
    			)
    		);
    	return comment;
    };
	</script>
</head>
<body>
<div class="loading-gif"></div>

	<div class="container-fluid header-fixtures-wrap">

		<div class="header-fixtures">
			<span>Artimiausios varžybos :</span>
			<span>Čempionų lyga |</span>
			<span>2015-09-15 21:45 |</span>
			<span>
				<img src="/images/images/Real-Madrid.png">
				:
				<img src="/images/images/shakhtar.png" title="Donecko 'Šakhtar' "></span>
			<span>Liko : <span id="countdown" style="color:white"></span></span>
		</div>

	</div>
	@include('partials.nav')
	<div class="container col-md-12">

		<div class="col-md-12 content">
		
			<h3>
				<img src="/images/images/header_logo.png" />
				&nbsp;
				<span style="vertical-align: -webkit-baseline-middle;" >Real Madrid C.F. fanų bendruomenė Lietuvoje</span>
			</h3>

			<form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ieškoti forume" name="forum_search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
	
			
			@yield('forum_content')

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
	$(document).ready(function(){
		$(document).on( "click", "#showForumPosts", function() {
		//$(".panel-heading > .pull-right").removeClass("fa-plus").addClass("fa-minus");
		//$( "#showComments" ).addClass("hideComments");
		 var time = 500;
			if($(this).hasClass("fa-folder-open-o")){		
				$(this).attr('title', 'Uždaryti');
				$(this).toggleClass("fa-folder-open-o fa-minus");
				$(this).parent().parent().find(".forum-posts-list-wrap").stop(0).slideDown(time);
			}else if($(this).hasClass("fa-minus")){
				$(this).attr('title', 'Atidaryti');
				$(this).toggleClass("fa-minus fa-folder-open-o");
				$(this).parent().parent().find(".forum-posts-list-wrap").stop(0).slideUp(time);
			}

  		//$("#commentForm").show(1500);
		});
});
</script>

<script type="text/javascript">
	$(document).ready(function(){	
		if($('.posts-list li').length >=6){
			$('.posts-list ul').attr('id', '#infinite-scroll');
		}
	});
</script>
<script type="text/javascript">
	$('#infinite-scroll').jscroll();
</script>

<script type="text/javascript">
var timestamp = new Date('2015-10-04 21:30:00');
//new Date(year, month, day, hours, minutes, seconds, milliseconds)
//var timestamp = new Date('2015-10-02 10:38:20');
var interval = 1;

//alert(timestamp.toLocaleDateString() + timestamp.toTimeString());

var timer = setInterval(function () {
    timestamp = new Date(timestamp.getTime() - interval*1000);
  
       if(timestamp.getDay() == 0 && timestamp.getHours() == 0 && timestamp.getMinutes() == 0 && timestamp.getSeconds() == 0){
       clearInterval(timer);
       }	$('#countdown').text(timestamp.getDay()+'d:'+timestamp.getHours()+'h:'+timestamp.getMinutes()+'m:'+timestamp.getSeconds()+'s');
    
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

<script type="text/javascript">
    var frm = $('#commentForm');
    frm.submit(function (e) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
            	$("#commentForm textarea").val(" ");
                var comment = createComment("/images/users/me.jpg", data.user_name, data.date, data.body, data.like, data.bomb);
    			$("#comment-box").prepend(comment);
    			showMessage("Puiku!", "Komentaras įterptas", "success");
            }
        });

        e.preventDefault();
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