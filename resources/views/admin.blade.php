<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8"/>
	<title>Administratoriaus panelė</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.0/sweetalert.css">
</head>

<body>
<div class="loading-gif"></div>

<div class="col-md-12"><h3 class="text-center">Real Madrid C.F. fanų bendruomenė Lietuvoje | Valdymo skydas</h3></div>
<div class="col-md-12">

		<img class="pull-left" src="/images/images/header_logo.png" />
		<span class="pull-right">Administratorius : {!! Auth::user()->name !!}</span>

</div>

<div class="col-md-12">
	<form class="navbar-form navbar-left" role="search">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Ieškoti">
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>
</div>



<div class="col-md-3 admin-sidebar">
	<div class="row">
  <div class="">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Navigacija</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav admin-nav">

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file-text"></i> Įrašai <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/posts/create"><i class="fa fa-pencil-square-o"></i> Naujas įrašas</a></li>
                <li><a href="/dashboard/posts"><i class="fa fa-table"></i> Visi įrašai</a></li>     
              </ul>
            </li>

            <li class="dropdown">
            
            <a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="">
            <i class="fa fa-futbol-o"></i> Real Madrid C.F.
                <span class="caret"></span>
            </a>
    		<ul class="dropdown-menu admin-dropdown multi-level" role="menu" aria-labelledby="dropdownMenu">

    		  <li class="dropdown-submenu">
                <a tabindex="-1" href="#"><i class="fa fa-star"></i> Sudėtis</a>
                <ul class="dropdown-menu">
                  <li><a href="#"><i class="fa fa-plus-circle"></i> Naujas sezonas</a></li>
                  <li><a href="#"><i class="fa fa-table"></i> Visi sezonai</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-heart"></i> Legendos</a></li>
              <li><a href="#"><i class="fa fa-trophy"></i> Trofėjai</a></li>
              <li><a href="#"><i class="fa fa-graduation-cap"></i> Akademija</a></li>
              <li><a href="#"><i class="fa fa-briefcase"></i> Valdžia</a></li>
              <li><a href="#"><i class="fa fa-history"></i> Istorija</a></li>	

            </ul>
     
            </li>
           
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-exchange"></i> Perėjimai <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="#"><i class="fa fa-plus-circle"></i> Naujas sezonas</a></li>
                <li><a href="#"><i class="fa fa-table"></i> Visi sezonai</a></li>     
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gamepad"></i> Komandos <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/teams/create"><i class="fa fa-plus-circle"></i> Nauja komanda</a></li>
                <li><a href="/dashboard/teams/"><i class="fa fa-table"></i> Visos komandos</a></li>     
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> Lygos <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/leagues/create"><i class="fa fa-plus-circle"></i> Nauja lyga</a></li>
                <li><a href="/dashboard/leagues"><i class="fa fa-table"></i> Visos lygos</a></li>     
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-calendar-plus-o"></i> Sezonai <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/seasons/create"><i class="fa fa-plus-circle"></i> Naujas sezonas</a></li>
                <li><a href="/dashboard/seasons"><i class="fa fa-table"></i> Visi sezonai</a></li>     
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i> Šalys <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/countries/create"><i class="fa fa-plus-circle"></i> Nauja šalis</a></li>
                <li><a href="/dashboard/countries"><i class="fa fa-table"></i> Visos šalys</a></li>     
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-futbol-o"></i> Pozicijos <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/positions/create"><i class="fa fa-plus-circle"></i> Nauja pozicija</a></li>
                <li><a href="/dashboard/positions"><i class="fa fa-table"></i> Visos pozicijos</a></li>     
              </ul>
            </li>

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Žaidėjai <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/players/create"><i class="fa fa-plus-circle"></i> Naujas žaidėjas</a></li>
                <li><a href="/dashboard/players"><i class="fa fa-table"></i> Visi žaidėjai</a></li> 
                <li class="divider"></li>
                <li><a href="/dashboard/players/statistics/create"><i class="fa fa-plus-circle"></i> Pridėti žaidėjo statistiką</a></li>
                <li><a href="/dashboard/players/statistics"><i class="fa fa-bar-chart"></i> Žaidėjų statistika</a></li>                       
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-university"></i> Stadionai <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/stadiums/create"><i class="fa fa-plus-circle"></i> Naujas stadionas</a></li>
                <li><a href="/dashboard/stadiums"><i class="fa fa-table"></i> Visi stadionai</a></li>
                <li class="divider"></li>
                <li><a href="/dashboard/santiago"><i class="fa fa-diamond"></i>Santiago Bernabeu</a></li>   
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-television"></i> Rungtynės <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="/dashboard/fixtures/create"><i class="fa fa-plus-circle"></i> Artimiausios rungtynės</a></li>
                <li><a href="/dashboard/latestFixtures"><i class="fa fa-table"></i> Paskutinės rungtynės</a></li>
                <li><a href="/dashboard/fixtures"><i class="fa fa-calendar-check-o"></i> Visos rungtynės</a></li>     
              </ul>
            </li>

            
            <li><a href="/dashboard/about"><i class="fa fa-users"></i> Apie mus</a></li>
            <li><a href="/dashboard/category"><i class="fa fa-folder"></i> Kategorijos</a></li>
            <li><a href="#"><i class="fa fa-tags"></i> Žymės</a></li>
            <li><a href="/dashboard/donate/editDonateText"><i class="fa fa-money"></i> Parama</a></li> 
             <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Vartotojai</a>
            </li>

             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-beer"></i> Forumas <b class="caret"></b></a>
              <ul class="dropdown-menu admin-dropdown">
                <li><a href="#"><i class="fa fa-plus-circle"></i> Nauja kategorija</a></li>
                <li><a href="#"><i class="fa fa-table"></i> Visos kategorijos</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-table"></i> Įrašai</a></li>

              </ul>
            </li>



            <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

</div>
</div>


<div class="col-md-9 admin-content">
	@yield('admin_content')
</div>


<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/js/scripts.js"></script>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        format: "yyyy-mm-dd hh:ii:ss",
       // linkField: "mirror_field",
        linkFormat: "yyyy-mm-dd hh:ii:ss",
        weekStart: 1,
        todayBtn:  1,
		    autoclose: 1,
		    todayHighlight: 1,
		    startView: 2,
		    forceParse: 0,
        showMeridian: 0
    });
	
</script>

<script type="text/javascript">
	$(document).ready(function(){
	//	var file = $('#file')[0].files[0];
	//	console.log(file);
        //$('#file_upload').text(file.name);
	});
</script>

<script type="text/javascript">
		$(window).load(function() {
		// Animate loader off screen
		$(".loading-gif").fadeOut("slow");;
	});
</script>
<!--
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
-->
<script type="text/javascript">
	$('#tag_list').select2();
</script>

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
<script type="text/javascript">
	Dropzone.options.myDropzone = {

  // Prevents Dropzone from uploading dropped files immediately
  autoProcessQueue: false,
  uploadMultiple: true,
  parallelUploads: 100,
  maxFiles: 100,
  acceptedFiles: "image/*",
  clickable: '#dropzonePreview',
  addRemoveLinks: true,
  previewsContainer: '#dropzonePreview',

  init: function() {
    var submitButton = document.querySelector("#submit-all")
        myDropzone = this; // closure

    submitButton.addEventListener("click", function() {
    	if (myDropzone.getQueuedFiles().length > 0) {                        
            myDropzone.processQueue();  
        } else {                       
            $("#my-dropzone").submit(); //send empty 
        }  
      //myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });

    // You might want to show the submit button only when 
    // files are dropped here:
    this.on("successmultiple", function() {
    	showMessage("", "Naujiena išsaugota!", "success");
    	setTimeout(function(){location.href = "/dashboard/posts"}, 1500);
    });

  }
};
</script>
<script>
	/*function getAllCategories(){
		var data = {
			_token: "<?php echo csrf_token() ?>",
		};
		var p = $.ajax({
            type: "post",
            data: data,
            url: "/dashboard/posts/category/getAllCategories",
            success: function (result) {
                var html = "";
                for(i in result){
                	var cat = result[i];
					html += '<option value="'+cat.id+'">'+cat.title+'</option>'
				}
				$("#category_id").html(html);
            }
        });
	}*/
</script>
<script type="text/javascript">
    $('#category-create').submit(function (e) {
    	$.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (result) {
            	var html = "";
                for(i in result){
                	var cat = result[i];
					html += '<option value="'+cat.id+'">'+cat.title+'</option>'
				}
				$("#category_id").html(html);
                $("#new_post_category").val(" ");
               //getAllCategories();
            }
        });
        e.preventDefault();
    });
</script>

<script type="text/javascript">
    /*var frm = $('#tag-create');
    frm.submit(function (e) {
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert('ok');
            }
        });

        e.preventDefault();
    });*/
 $('#tag-create').submit(function (e) {
    	$.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (result) {
            	var html = "";
                for(i in result){
                	var tag = result[i];
					html += '<option value="'+tag.id+'">'+tag.title+'</option>'
				}
				$("#tag_list").html(html);
                $("#new_post_tag").val(" ");
               //getAllCategories();
            }
        });
        e.preventDefault();
    });
</script>
<script type="text/javascript">
	$('#myDeleteModal').on('show.bs.modal', function (event) {
		var post_id = $(event.relatedTarget).attr("post-id");
		var input = $(this).find("#modal-delete-form").attr("action", "/dashboard/posts/"+post_id);
	});
</script>

<script type="text/javascript">
  $('#myLeagueDeleteModal').on('show.bs.modal', function (event) {
    var league_id = $(event.relatedTarget).attr("league-id");
    var input = $(this).find("#modal-league-delete-form").attr("action", "/dashboard/leagues/"+league_id);
  });
</script>

<script type="text/javascript">
  $('#myTeamDeleteModal').on('show.bs.modal', function (event) {
    var team_id = $(event.relatedTarget).attr("team-id");
    var input = $(this).find("#modal-team-delete-form").attr("action", "/dashboard/teams/"+team_id);
  });
</script>

<script type="text/javascript">
  $('#myStadiumDeleteModal').on('show.bs.modal', function (event) {
    var stadium_id = $(event.relatedTarget).attr("stadium-id");
    var input = $(this).find("#modal-stadium-delete-form").attr("action", "/dashboard/stadiums/"+stadium_id);
  });
</script>

<script type="text/javascript">
  $('#mySeasonDeleteModal').on('show.bs.modal', function (event) {
    var season_id = $(event.relatedTarget).attr("season-id");
    var input = $(this).find("#modal-season-delete-form").attr("action", "/dashboard/seasons/"+season_id);
  });
</script>

<script type="text/javascript">
  $('#myCategoryDeleteModal').on('show.bs.modal', function (event) {
    var category_id = $(event.relatedTarget).attr("category-id");
    var input = $(this).find("#modal-category-delete-form").attr("action", "/dashboard/category/"+category_id);
  });
</script>

<script type="text/javascript">
  $('#myPlayersDeleteModal').on('show.bs.modal', function (event) {
    var player_id = $(event.relatedTarget).attr("player-id");
    var input = $(this).find("#modal-player-delete-form").attr("action", "/dashboard/players/"+player_id);
  });
</script>




@include ('flash')
	
</body>	
</html>