@extends('admin')

@section('admin_content')
<h1 class="text-center">Apie mus pakeitimai</h1>


<div class="col-md-10 col-md-offset-1">
@include('errors.list')
		<form action="/dashboard/about/{!! $about->id !!}/redaguoti" method="POST" id="editLeagueForm">

		{{ csrf_field() }}
	  <div class="form-group">
	    <label for="name">Pavadinimas : </label>
	    <textarea name="about" class="form-control" rows="10" id="aboutTextarea">
	    	{!! $about->about !!}
	    </textarea>
	  </div>
	

	  <button type="submit" class="btn btn-primary form-control">Redaguoti</button>

	</form>
</div>	

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
        tinymce.init({
            selector: "#aboutTextarea"
        });
    </script>
@endsection


