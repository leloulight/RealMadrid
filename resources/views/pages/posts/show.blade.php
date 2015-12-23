@extends('layout')

@section('title')
{!! $post->title !!} | 
@endsection

@section('content')

<script type="text/javascript">
	$(document).ready(function(){
		$(document).on( "click", ".showAnswerForm", function(){
		//$(".showAnswerForm").on( "click", function() {
		//$(".panel-heading > .pull-right").removeClass("fa-plus").addClass("fa-minus");
		//$( "#showComments" ).addClass("hideComments");
			//console.log("test");
	
		 var time = 500;
		 var answer = $(this).parent().parent().parent().find("#subCommentForm");
			//if($(this).hasClass("fa-minus")){
				//$("#subCommentForm").stop(0).slideUp(time);
			//	$(this).toggleClass("fa-minus fa-pencil");
			//}else if($(this).hasClass("fa-pencil")){
				answer.stop(0).slideToggle(time);
			//	$(this).toggleClass("fa-pencil fa-minus");
			//}
  		//$("#commentForm").show(1500);
		});
});
</script>
<article>
<div class="col-md-8 col-md-offset-2">

<h2 class="text-center">{!! $post->title !!}</h2>
<h5 class="text-center">{!! $category->title !!}</h5>
<div class="pull-left">Autorius : {!! $post->user->name !!} {!! $post->user->lastname!!}</div>
<div class="pull-right">{!! $post->created_at->diffForHumans() !!}</div>


<div class="col-md-12 gallery">
		{{--*/ $photos_count = count($post->photos) /*--}}
		{{--*/ $i = 0 /*--}}
			@if($photos_count > 0)
			<div class="row">
				<div class="gallery_image">
				<figure>

				<a href="/{!! $post->photos[0]->path.$post->photos[0]->name !!}" class="swipebox" title="{!! $post->title !!}">
			      <img src="/{!! $post->photos[0]->path.$post->photos[0]->name !!}" >
			      </a>
				  
				  <figcaption>
				  {!! $post->photo_description !!}
				  </figcaption>
				</figure>
				</div>
			</div>
			{{--*/ $i++ /*--}}
			@endif
		<div class="pull-left show-social-wrap">	
			<i class="fa fa-twitter-square fa-2x"></i>
			<a href="https://www.facebook.com/sharer/sharer.php?u=/irasai/{!! $post->category->slug !!}/{!! $post->slug !!}" target="_blank">
			  <i class="fa fa-facebook-official fa-2x"></i>
			</a>
				<a href="javascript:window.print()"><i class="fa fa-print fa-2x"></i></a>
		</div>
		<div class="pull-right show-text-size print">
			<i class="fa fa-text-height" id="decrementTextSize"></i>
			<i class="fa fa-text-height fa-2x" id="incrementTextSize"></i>&nbsp;
		</div>
	</div>
	<div class="col-md-12 post-show">{!! $post->body !!}</div>
	
	<div class="col-md-12">
	<ul class="list-inline post-tags">		
		@foreach($tags as $tag)
		<li><a href="/gaires/{!! $tag->slug !!}" class="btn">{!! $tag->title !!}</a></li>
		@endforeach
	</ul>
		@if($photos_count > 1)
		<ul class="list-inline image-list">
			@for($i; $i < $photos_count; $i++ )
			  <li>
			  <a href="/{!! $post->photos[$i]->path.$post->photos[$i]->name !!}"  class="swipebox" title="{!! $post->title !!}">
			  <img  src="/{!! $post->photos[$i]->path.$post->photos[$i]->name !!}" alt="">
			  </a>
			  </li>
			@endfor
			</ul>

		@endif
	</div>

</div>
</article>

<div class="col-md-8 col-md-offset-2">
<div id="disqus_thread"></div>
<script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
     */
    /*
    var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        
        s.src = '//realfanai.disqus.com/embed.js';
        
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
</div>

<!-- div class="col-md-8 col-md-offset-2 comment-wrap">

	<div class="panel panel-default">
				<div class="panel-heading comment-heading">
					<h3 class="panel-title pull-left"> <i class="fa fa-envelope"></i>
						Komentarai
					</h3>
					<i class="pull-right fa fa-pencil fa-3" id="showComments"></i>
				</div>

				<div class="panel-body" id="comment-panel">
				@if(Auth::check())
				<form action="/comments/{!! $post->id !!}" method="POST" id="commentForm">
				{{ csrf_field() }}
					<div class="form-group">
						<textarea class="form-control" rows="3" cols="50" name="comment-text" placeholder="Komentaras"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary form-control" type="submit">Rašyti komentarą</button>
					</div>
				</form>
				@endif

			<div id="comment-box"></div>

			 <div class="comment-box"> </div>

			</div>

				</div>
			</div>
-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#incrementTextSize").on( "click", function() {
			var fontSize = parseInt($(".post-show").css("font-size"));
			if(fontSize < 30){
				fontSize = fontSize + 2 + "px";
			}
			$(".post-show").css({'font-size':fontSize});
		});
		$("#decrementTextSize").on( "click", function() {
			var fontSize = parseInt($(".post-show").css("font-size"));
			if(fontSize > 12){
				fontSize = fontSize - 2 + "px";
			}	
			$(".post-show").css({'font-size':fontSize});
		});
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#showComments").on( "click", function() {
		//$(".panel-heading > .pull-right").removeClass("fa-plus").addClass("fa-minus");
		//$( "#showComments" ).addClass("hideComments");
		 var time = 500;
			if($(this).hasClass("fa-minus")){
				$("#commentForm").stop(0).slideUp(time);
				$(this).toggleClass("fa-minus fa-pencil");
			}else if($(this).hasClass("fa-pencil")){
				$("#commentForm").stop(0).slideDown(time);
				$(this).toggleClass("fa-pencil fa-minus");
			}
  		//$("#commentForm").show(1500);
		});
});
</script>

<script type="text/javascript">
	 function addLink() {
        //Get the selected text and append the extra info
        var selection = window.getSelection(),
            pagelink = '<br /><br /> Daugiau skaitykite : ' + document.location.href,
            copytext = selection + pagelink,
            newdiv = document.createElement('div');

        //hide the newly created container
        newdiv.style.position = 'absolute';
        newdiv.style.left = '-99999px';

        //insert the container, fill it with the extended text, and define the new selection
        document.body.appendChild(newdiv);
        newdiv.innerHTML = copytext;
        selection.selectAllChildren(newdiv);

        window.setTimeout(function () {
            document.body.removeChild(newdiv);
        }, 100);
    }

    document.addEventListener('copy', addLink);
</script>
<script>
	var comment_count = 5;
	var comment_from = 0;
	$(document).ready(function(){
		$(document).on("click", ".showAnswerButton", function(){
			$(this).parent().parent().find("ul").toggleClass("hide show");
		});
	});
    function getComment(count, from){
    	var params = {_token: "<?php echo csrf_token() ?>", count: count, from: from };
    	$.post("/posts/getpostcomments/{!! $post->id !!}", params ,function(data){
    		//console.log(data);
    		if (data.comments.length > 0){
    			var ul = $("<ul/>").addClass("col-md-12 no-padding-left no-padding-right");
	    		for(comment in data.comments){
	    			var comm = data.comments[comment];
	    			var li = $("<li/>").addClass("col-md-12 no-padding-left no-padding-right");
	    			var comment = createComment(comm.id, true,"/images/users/me.jpg", comm.user_name, comm.date, comm.body, comm.like, comm.bomb);
	    			li.append(comment.append("<div class='showAnswerButton pull-right'> <i class='fa fa-comments'></i>Rodyti atsakymus</div>"));
	    			if(comm.childs.length > 0){
    					var ul2 = $("<ul/>").addClass("col-md-12 no-padding-right hide");
	    				for(child_comment in comm.childs){
	    					var li2 = $("<li/>").addClass("col-md-12 no-padding-left no-padding-right");
		    				var child = comm.childs[child_comment];
		    				var comment2 = createComment(child.id, false, "/images/users/me.jpg", child.user_name, child.date, child.body, child.like, child.bomb);
	    					ul2.append($("<li/>").append(comment2));
	    				}
	    				li.append(ul2);
	    			}
	    			ul.append(li);
	    		}
	    		$(".comment-box").append(ul);
	    	}
    		var more = $("<button/>").addClass("btn").addClass("btn-default").addClass("form-control").attr("id", "more-comments").text("Daugiau komentarų").on("click", function(){moreComment()});
    		if(data.comment_count > comment_count && comment_from == 0)
    			$(".comment-box").parent().append(more);
    	});
    }
    function moreComment(){
		comment_from += comment_count;
		getComment(comment_count, comment_from);
    }
    $(document).ready(function(){
    	$(".comment-box").html("");
    	getComment(comment_count, comment_from);
    	//var test  = createComment("/images/users/me.jpg", "test test555", "2015-05-15", "komentaras", 15, 10);
    	//$("#test").html(test);
    	/*$("#more-comments").on("click", function(){
    		console.log("hihi");
    		comment_from += comment_count;
    		getComment(comment_count, comment_from);
    	});*/


    });
</script>

<script>
		function createComment(comment_id, is_parent, img_path, user, date, comment, like, bomb){
			var comment_bottom = 
					$("<div/>").addClass("col-md-11 col-md-offset-1").append(
	    				$("<div/>").addClass("pull-left").append(
	    					$("<span/>").addClass("comment-like").append(
	    						$("<i/>").addClass("fa fa-plus").text(like)
	    					)
	    				).append(
	    					$("<span/>").addClass("comment-bomb").append(
	    						$("<i/>").addClass("fa fa-bomb").text(bomb)
	    					)
	    				)
	    			);
	    	if (is_parent) {
	    		comment_bottom.append(
	    				$("<div/>").addClass("pull-right").append(
	    					$("<span/>").addClass("comment-answer").append(
	    						$("<p/>").addClass("showAnswerForm").text("Atsakyti")
	    					)
	    				)
	    			).append(
	    				$("<div/>").addClass("col-md-12").append(
	    					$("<form/>").addClass("subCommentForm").attr("id", "subCommentForm").attr("action", "/comments/"+{!! $post->id !!}).attr("method","POST").html(
								'{{ csrf_field() }}'
	    					).append(
	    						$("<input/>").attr("type", "hidden").attr("name","parent_id").val(comment_id)
	    					).append(
	    						$("<div/>").addClass("form-group").append(
	    							$("<textarea/>").addClass("form-control").attr("rows", "1").attr("cols", "50").attr("name", "comment-text").attr("placeholder", "Komentaras")
	    						)
	    					).append(
	    						$("<div/>").addClass("form-group").append(
	    							$("<button/>").addClass("btn btn-primary form-control").attr("type", "submit").text("Atsakyti")
	    						)
	    						.append(
	    								$("<i/>").addClass("fa fa-share"))
	    					)
	    				)
	    			);
	    	}

	    	var comment =
	    		$("<div/>").addClass("col-md-12 no-padding-left no-padding-right comment-wrap").append(
	    			$("<div/>").addClass("col-md-1").append(
	    				$("<img/>").attr("src", img_path).attr("style", "width: 30px;")
	    			).append("&nbsp;")
	    		).append(
	    			$("<div/>").addClass("col-md-11 no-padding-right").append(
	    				$("<span/>").attr("style", "font-size: 12px;").append(
	    					$("<b/>").html(user)
	    				).append("&nbsp;")
	    			).append(
	    				$("<span/>").attr("style", "font-size: 12px;").html(comment)
	    			).append(
	    				$("<span/>").addClass("comment-time pull-right").html("( "+date+" )")
	    			)
	    		).append(
	    			comment_bottom
	    		);
    		/*$("<div/>").addClass("comment-wrap").append(
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
    		);*/
			
    	return comment;
    };
	</script>

	<script type="text/javascript">
    $('#commentForm').submit(function (e) {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
            	$("#commentForm textarea").val("");
            	var li = $("<li/>").addClass("col-md-12 no-padding-left no-padding-right");
                var comment = createComment(data.id, true,"/images/users/me.jpg", data.user_name, data.date, data.body, data.like, data.bomb);
    			$(".comment-box ul").prepend(li.append(comment));
    			showMessage("Puiku!", "Komentaras įterptas", "success");
            }
        });

        e.preventDefault();
    });
    $(document).on("submit", ".subCommentForm", function (e) {
    	//console.log($(this));
    	var form = $(this);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
             	form.find("textarea").val("");
             	
             	var comment = createComment(data.id, false,"/images/users/me.jpg", data.user_name, data.date, data.body, data.like, data.bomb);
    			
             	var new_comm = form.parent().parent().parent().parent();
            	
            	var li = $("<li/>").addClass("col-md-12 no-padding-left no-padding-right");
            	li.append(comment);
            	if (new_comm.find("ul").length == 0) {
            		var ul = $("<ul/>").addClass("col-md-12 no-padding-right");
	    			new_comm.append(ul.append(li));	
            	}else{
            		new_comm.find("ul").prepend(li);	
            	}

            	showMessage("Puiku!", "Komentaras įterptas", "success");
            	//ul.prepend(li);
            	//new_comm.append(ul)
                
            	//console.log(new_comm);

		    	//$(".comment-box").html("");
		    	//getComment(comment_count, comment_from);
            	/*$("#commentForm textarea").val("");
            	var li = $("<li/>").addClass("col-md-12 no-padding-left no-padding-right");
                var comment = createComment(data.id, true,"/images/users/me.jpg", data.user_name, data.date, data.body, data.like, data.bomb);
    			$(".comment-box ul").prepend(li.append(comment));
    			showMessage("Puiku!", "Komentaras įterptas", "success");*/
            }
        });

        e.preventDefault();
    });
</script>


<script id="dsq-count-scr" src="//realfanai.disqus.com/count.js" async></script>
@endsection