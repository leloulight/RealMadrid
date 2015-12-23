@extends('admin')

@section('admin_content')
<h1 class="text-center">Šalių pakeitimai - {!! $country->title !!}</h1>


<div class="col-md-10 col-md-offset-1">
@include('errors.list')
		<form action="/dashboard/countries/{!! $country->id !!}/redaguoti" method="POST" id="editCountryForm" enctype="multipart/form-data">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">Pavadinimas : </label>
	    <input type="text" class="form-control" name="title" placeholder="Pavadinimas" value="{!! $country->title !!}">
	  </div>
	
	           @if ($country->flag_name)
                <div class="edit-post-image">
                <img src="/{!! $country->flag_path.$country->flag_name !!}" title="{!! $country->title !!}">
                </div>
                <div id="profile-upload">
	                 <div class="form-group">
				      <label>Šalies vėliava :</label><br/>
				      <input type="file" name="edit-country-flag" id="file" class="inputfile" accept="image/*" />
				      <label for="file">
				      <i class="fa fa-cloud-upload"></i>
				      Įkelti vėliavą</label>
				      <br/>
				      <span id="file_upload"></span>
				      <div id="files_names"></div>
				    </div>
			    </div>
			    @else
			    <div id="profile-upload">
	                <h4>Vėliava nebuvo įkelta</h4>
	                <p>Įkelkite vėliavą :</p>
	                 <div class="form-group">
				      <label>Vėliava:</label><br/>
				      <input type="file" name="edit-country-photo" id="file" class="inputfile" accept="image/*" />
				      <label for="file">
				      <i class="fa fa-cloud-upload"></i>
				      Įkelti vėliavą</label>
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
  $("#editCountryForm #file").change(function() {
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


