@extends('admin')

@section('admin_content')
<h1 class="text-center">Rezultato pakeitimai</h1>

@foreach($fixture as $fix)
<div class="col-md-10 col-md-offset-1">
<a href="/dashboard/latestFixtures" class="btn btn-primary">Atgal</a>
@include('errors.list')
		<form action="/dashboard/fixtures/{!! $fix->fixture_id !!}/redaguoti" method="POST" id="editfixtureForm">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">{!! $fix->team1_title !!} rezultatas </label>
	    <span><img src="/{!! $fix->team1_logo_path.$fix->team1_logo_name !!}" title="{!! $fix->team1_title !!}" height="25px"></span>
	    <input type="number" class="form-control" name="team_1_score" placeholder="{!! $fix->team1_title !!} rezultatas" value="{!! $fix->team_1_score !!}">
	  </div>

	  <div class="form-group">
	    <label for="name">{!! $fix->team2_title !!} rezultatas </label>
	    <span><img src="/{!! $fix->team2_logo_path.$fix->team2_logo_name !!}" title="{!! $fix->team2_title !!}" height="25px"></span>
	    <input type="number" class="form-control" name="team_2_score" placeholder="{!! $fix->team2_title !!} rezultatas" value="{!! $fix->team_2_score !!}">
	  </div>

	  <button type="submit" class="btn btn-primary form-control">Redaguoti</button>

	</form>
</div>	
@endforeach
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#editLeagueForm #file").change(function() {
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#file_upload").text(fileName);
  });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
    $("#file").change(function(){

        //console.log($(this)[0]);
        $("#files_names")/*.html("<p>Selected file name: </p>").append($(this)[0].files[0].name)*/.append("<br>").append("<div class='user-edit-image'><img></div>");
        readURL($(this)[0], "#files_names img");
        //$(".files_names").html("Selected file name: ").append($(this)[0].files[0].name).append("<img src='"+$(this)[0].files[0].name+"'>");
    });

});

function readURL(input, img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(img).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

</script>

@endsection


