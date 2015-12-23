@extends('admin')

@section('admin_content')
<h1 class="text-center">Paramos pakeitimai</h1>


<div class="col-md-10 col-md-offset-1">
@include('errors.list')
		<form action="/dashboard/donate/{!! $donate->id !!}/redaguoti" method="POST" id="editLeagueForm">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">Paramos tekstas : </label>
	    <textarea name="donate" class="form-control" rows="10" id="donateTextarea">
	    	{!! $donate->donate !!}
	    </textarea>
	  </div>
	

	  <button type="submit" class="btn btn-primary form-control">Redaguoti</button>

	</form>
</div>	

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
        tinymce.init({
             selector: "#donateTextarea",
    plugins: [
        "advlist autolink lists link charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>
@endsection


