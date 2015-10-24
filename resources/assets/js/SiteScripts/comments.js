
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
            //  $(this).toggleClass("fa-minus fa-pencil");
            //}else if($(this).hasClass("fa-pencil")){
                answer.stop(0).slideToggle(time);
            //  $(this).toggleClass("fa-pencil fa-minus");
            //}
        //$("#commentForm").show(1500);
        });
});

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

		function createComment(post_id,comment_id, is_parent, img_path, user, date, comment, like, bomb){
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
