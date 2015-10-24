
var timer = null;
$("#search-input").on('input', function(){
	clearTimeout(timer);
	if ($(this).val().length >= 1) {
		timer = setTimeout(function(){
			var frm = $('#searchForm');
			 $.ajax({
	            type: frm.attr('method'),
	            url: '/paieska-ajax',
	            data: frm.serialize(),
	            success: function (data) {
					var list = $("#search-results").text(" ");
					if(data.posts.length > 0){
						list.append($("<h4/>").attr('class', 'list-title text-center').text("Įrašai"));
						var ul = $("<ul/>");
		            	$.each(data.posts, function(index, item){
		            	
		            		var li = $("<li/>").append(
		            				$("<a/>").attr("href","/irasai/"+item.category.slug+"/"+item.post.slug).append(
					 				$("<img/>").attr('src', "/"+item.photos.path+item.photos.name).attr('title', item.post.title)
					 				)
					 			)
		            		//var image = "/"+item.photos.path+item.photos.name;
		            		var imageUrl = "/"+item.photos.path+item.photos.name;
							//$.each(item.photos, function(index2, item2){
					 			li.append(
					 				
					 				//$('<div/>').css('background-image', 'url(' + imageUrl + ')')
					 				$("<a/>").attr("href","/irasai/"+item.category.slug+"/"+item.post.slug).text(item.post.title)
					 				//$("<div/>").attr("style", "background-image:url("/"+item.photos.path+item.photos.name+); height: 50px; width:50px;")
					 				//$("<div/>").attr("style", "background-image:url("/"+item.photos.path+item.photos.name)")
						 			
						 		);
							//});
							ul.append(li);
						});
						list.append(ul);
					}

					if(data.categories.length > 0){
						list.append($("<h4/>").attr('class', 'list-title text-center').text("Kategorijos"));
						ul = $("<ul/>");
						$.each(data.categories, function(index, item){
							ul.append(
					 			$("<li/>").append($("<i/>").attr('class', 'fa fa-folder')
					 			).append($("<a/>").attr("href","/kategorija/"+item.slug).text(item.title)
					 		  )
					 		);						
						});
						list.append(ul);
					}

					if(data.tags.length > 0){
						list.append($("<h4/>").attr('class', 'list-title text-center').text("Gairės"));
						ul = $("<ul/>");
						$.each(data.tags, function(index, item){
		            		ul.append(
					 			$("<li/>").append(
					 			$("<i/>").attr('class', 'fa fa-tags')
					 			).append($("<a/>").attr("href","/gaires/"+item.slug).text(item.title)
					 		  )
					 		);
						});
						list.append(ul);
					}

					if (data.categories.length == 0 && data.tags.length == 0 && data.posts.length == 0) {
						$("#search-results").text("Rezultatų nerasta");
					};
				}
			});  
		},500);
	}else{
		$("#search-results").text(" ");
	}
});

$('document.body').click(function(){
    //$('#search-results').hide();
    alert('Body');
});