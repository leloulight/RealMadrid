@extends('admin')

@section('admin_content')

<!-- Modal -->
<div id="myCategoryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-center">Jei neradai tinkamos kategorijos - sukurk čia</h4>
      </div>
      <div class="modal-body">

      <div class=" col-md-8 col-md-offset-2">
		<form method="POST" action="/dashboard/posts/category/create" id="category-create">
		{!! csrf_field() !!}
		<div class="form-group">
    <br/>
			<label for="new-category">Pavadinimas :</label>
			<input id="new_post_category" type="text" name="new-post-category" class="form-control" />
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-default form-control">Sukurti kategoriją</button>
			</div>
		</form>
		</div>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
<!-- Modalo pabaiga -->

<!-- Modal -->
<div id="myTagModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-center">Jei neradai tinkamos gairės - sukurk čia</h4>
      </div>
      <div class="modal-body">
        <div class=" col-md-8 col-md-offset-2">
			<form method="POST" action="/dashboard/posts/tag/create" id="tag-create">
			{!! csrf_field() !!}
      <br/>
			<div class="form-group">
				<input type="text" id="new_post_tag" name="new-post-tag" class="form-control" placeholder="Pavadinimas"/>
				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-default form-control">Sukurti gairę</button>
				</div>
			</form>
			</div>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
<!-- Modalo pabaiga -->



<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-10 col-md-offset-1">

<h3 class="text-center">Sukurti naują įrašą : </h3>

	{!! Form::open(['url'=>'/dashboard/posts/create/photos','files'=>true, 'id'=>'my-dropzone', 'class'=>'dropzone']) !!}

	{!! csrf_field() !!}


    <div class="form-group">
    {!! Form::label('title','Pavadinimas : ') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

	<div class="form-group">
		{!! Form::label('category','Kategorija : ') !!} 
		<em><a class="create-modal" data-toggle="modal" data-target="#myCategoryModal">(Sukurti naują kategoriją)</a></em>
		<select name="category_id" id="category_id" class="form-control" >
			@foreach($categories as $category)
				<option value="{!! $category->id !!}">{!! $category->title !!}</option>
			@endforeach
		</select>
    </div>

    <div class="form-group">
    {!! Form::label('excerpt','Trumpas aprašymas : ') !!}
    {!! Form::textarea('excerpt',null,['class'=>'form-control', 'rows'=>'3', 'id'=>'excerpt']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('body','Tekstas : ') !!}
    {!! Form::textarea('body',null,['class'=>'form-control ckeditor', 'id'=>'textarea']) !!}
    <textarea name="textarea-body" style="display:none;" id="textarea-value"></textarea>
    </div>

    <div class="form-group">
	    {!! Form::label('tags','Gairės : ') !!}
	    <em><a class="create-modal" data-toggle="modal" data-target="#myTagModal">(Sukurti naują gairę)</a></em>
	    <select name="tags[]" id="tag_list" class="form-control" multiple="true">
			@foreach($tags as $tag)
			 	<option value="{!! $tag->id !!}">{!! $tag->title !!}</option>
		    @endforeach
	    </select>
    </div>

     <div class="form-group">
        <label for="dtp_input1" class=" control-label">Skelbimo data :</label>
        <div class="input-group date form_datetime" data-date="2015-09-16" data-date-format="dd MM yyyy - HH:ii:ss p" data-link-field="dtp_input1">
            <input class="form-control" size="16" type="text" name="published_at" value="" readonly>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove">	
            </span>
            </span>

			<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span>
			</span>
        </div>
		<input type="hidden" id="dtp_input1" value="" /><br/>
    </div>

      <div class="form-group">
    <label for="photo_description">Pagrindinės nuotr. aprašymas</label>
    <input type="text" name="photo_description" class="form-control">
     </div>

    <div class="form-group">
	    <div id="dropzonePreview" class="dz-default dz-message" style="cursor: pointer; border:1px solid black;padding:4%;">
	  		<span>Spauskite arba meskite failus čia, norėdami juos įkelt</span><br/>
		</div>
	</div>

    <div class="form-group">
    {!! Form::button('Sukurti įrašą',['class'=>'btn btn-primary form-control', 'id'=>'submit-all']) !!}
    </div>
	
    {!! Form::close() !!}
</div>
<!--	
	<div class=" col-md-8 col-md-offset-2">
	<form action="/dashboard/posts/create/photos" method="POST" class="dropzone" id="my-dropzone">
		{{ csrf_field() }}
	</form>
	</div>
-->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>

<script type="text/javascript">

$( "#submit-all").on("mouseover", function() {
  var value = CKEDITOR.instances['textarea'].getData();
  $("#textarea-value").text(value);
});
</script>


@endsection