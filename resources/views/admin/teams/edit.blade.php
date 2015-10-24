@extends('admin')

@section('admin_content')
<h1 class="text-center">Komandos redagavimas {!! $team->title !!}</h1>


<div class="col-md-10 col-md-offset-1">
@include('errors.list')
		<form action="/dashboard/teams/{!! $team->id !!}/update" method="POST" id="editTeamForm" enctype="multipart/form-data">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">Pavadinimas : </label>
	    <input type="text" class="form-control" name="title" placeholder="Pavadinimas" value="{!! $team->title !!}">
	  </div>

		  <div class="form-group">
	    <label for="stadium_id">Stadionas :</label>
	      <select class="form-control" name="stadium_id">
	      @foreach($stadiums as $stadium)
	       @if($team->stadium->id == $stadium->id)
	        <option value="{!! $stadium->id !!}" selected="selected">{!! $stadium->title !!}</option>
	        @else
	        <option value="{!! $stadium->id !!}">{!! $stadium->title !!}</option>
	        @endif
	        @endforeach
	      </select>
	    </div>
	
	           @if ($team->logo_name)
                <div class="edit-post-image">
                <img src="/{!! $team->logo_path.$team->logo_name !!}" title="{!! $team->title !!}">
                </div>
                <div id="profile-upload">
	                 <div class="form-group">
				      <label>Komandos logo:</label><br/>
				      <input type="file" name="edit-team-logo" id="file" class="inputfile" accept="image/*" />
				      <label for="file">
				      <i class="fa fa-cloud-upload"></i>
				      Įkelti nuotrauką</label>
				      <br/>
				      <span id="file_upload"></span>
				      <div id="files_names"></div>
				    </div>
			    </div>
			    @else
			    <div id="profile-upload">
	                <h4>Nuotrauka nebuvo įkelta</h4>
	                <p>Įkelkite nuotrauką :</p>
	                 <div class="form-group">
				      <label>Komandos logo:</label><br/>
				      <input type="file" name="edit-team-logo" id="file" class="inputfile" accept="image/*" />
				      <label for="file">
				      <i class="fa fa-cloud-upload"></i>
				      Įkelti nuotrauką</label>
				      <br/>
				      <span id="file_upload"></span>
				      <div id="files_names"></div>
				    </div>
			    </div>
                @endif

	  <button type="submit" class="btn btn-primary form-control">Redaguoti</button>

	</form>
</div>	

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#editTeamForm #file").change(function() {
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


