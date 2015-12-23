@extends('admin')

@section('admin_content')
<h1 class="text-center">Santiago bernabeu pakeitimai</h1>


<div class="col-md-10 col-md-offset-1">
@include('errors.list')
		<form action="/dashboard/santiago/{!! $santiago->id !!}/redaguoti" method="POST" id="editSantiagoForm" enctype="multipart/form-data">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">Atidarymas : </label>
	    <input type="text" class="form-control" name="opening" placeholder="Atidarymas" value="{!! $santiago->opening !!}">
	  </div>

	  <div class="form-group">
	    <label for="name">Dydis : </label>
	    <input type="text" class="form-control" name="dimensions" placeholder="Dydis" value="{!! $santiago->dimensions !!}">
	  </div>

	  <div class="form-group">
	    <label for="name">Adresas : </label>
	    <input type="text" class="form-control" name="address" placeholder="Adresas" value="{!! $santiago->address !!}">
	  </div>

	  <div class="form-group">
	    <label for="name">Žiūrovų sk. : </label>
	    <input type="text" class="form-control" name="capacity" placeholder="Žiūrovų sk." value="{!! $santiago->capacity !!}">
	  </div>
	
	           @if ($santiago->photo_name)
                <div class="edit-post-image">
                <img src="/{!! $santiago->photo_path.$santiago->photo_name !!}">
                </div>
                <div id="profile-upload">
	                 <div class="form-group">
				      <label>Santiago bernabeu nuotrauka:</label><br/>
				      <input type="file" name="edit-santiago-photo" id="file" class="inputfile" accept="image/*" />
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
				      <label>Santiago bernabeu nuotrauka:</label><br/>
				      <input type="file" name="edit-santiago-photo" id="file" class="inputfile" accept="image/*" />
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
  $("#editSantiagoForm #file").change(function() {
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


