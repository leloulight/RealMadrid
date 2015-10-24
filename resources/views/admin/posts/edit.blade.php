
@extends('admin')

@section('admin_content')

<div class="container col-md-8 col-md-offset-2">@include('errors.list')</div>

<div class="container col-md-10 col-md-offset-1">

<h3 class="text-center">Redaguoti įrašą : </h3>

	{!! Form::open(['url'=>'/dashboard/posts/'.$post->id,'files'=>true, 'id'=>'my-dropzone', 'class'=>'dropzone']) !!}

	{!! csrf_field() !!}
	<input type="hidden" name="_method" value="PUT">

    <div class="form-group">
    {!! Form::label('title','Pavadinimas : ') !!}
    {!! Form::text('title',$post->title,['class'=>'form-control']) !!}
    </div>

	<div class="form-group">
		{!! Form::label('category','Kategorija : ') !!} 
		<em><a  class="" data-toggle="modal" data-target="#myCategoryModal">(Sukurti naują kategoriją)</a></em>
		<select name="category_id" id="category_id" class="form-control" >
			@foreach($categories as $category)
				@if($post->category_id == $category->id)
					<option selected value="{!! $category->id !!}">{!! $category->title !!}</option>
				@else
					<option value="{!! $category->id !!}">{!! $category->title !!}</option>
				@endif
			@endforeach
		</select>
    </div>
    
    <div class="form-group">
    {!! Form::label('excerpt','Trumpas aprašymas : ') !!}
    {!! Form::textarea('excerpt',$post->excerpt,['class'=>'form-control', 'rows'=>'3']) !!}
    </div>

     <div class="form-group">
    {!! Form::label('body','Tekstas : ') !!}
    {!! Form::textarea('body',$post->body,['class'=>'form-control ckeditor', 'id'=>'textarea']) !!}
    <textarea name="textarea-body" style="display:none;" id="textarea-value"></textarea>
    </div>

    <div class="form-group">
	    {!! Form::label('tags','Gairės : ') !!}
	    <em><a  class="" data-toggle="modal" data-target="#myTagModal">(Sukurti naują gairę)</a></em>
	    <select name="tags[]" id="tag_list" class="form-control" multiple="true">
			@foreach($tags as $tag)
				@if(is_array($postTags) && in_array($tag->id, $postTags))
			 		<option selected value="{!! $tag->id !!}">{!! $tag->title !!}</option>
			 	@else
			 		<option value="{!! $tag->id !!}">{!! $tag->title !!}</option>
				@endif
		    @endforeach
	    </select>
    </div>

     <div class="form-group">
        <label for="dtp_input1" class=" control-label">Skelbimo data :</label>
        <div class="input-group date form_datetime" data-date="2015-09-16" data-date-format="dd MM yyyy - HH:ii:ss p" data-link-field="dtp_input1">
            <input class="form-control" size="16" type="text" name="published_at" value="{!! $post->published_at !!}" readonly>
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
    <input type="text" name="photo_description" class="form-control" value="{!! $post->photo_description !!}">
     </div>

	@if(count($post->photos) > 0)
	    <div class="form-group">
	    	<ul class="list-inline">
		    	@foreach($post->photos as $photo)
					<li>
						<img src="/{!! $photo->path.$photo->name !!}" width="70">
						<br>
						<label for="post_images_{!! $photo->id !!}"><input id="post_images_{!! $photo->id !!}" type="checkbox" name="post_photos[]" value="{!! $photo->id !!}"> Ištrinti</label>
					</li>
				 @endforeach
			</ul>
	    </div>
    @endif

    <div class="form-group">
	    <div id="dropzonePreview" class="dz-default dz-message" style="cursor: pointer; border:1px solid black;padding:4%;">
	  		<span>Spauskite arba meskite failus čia, norėdami juos įkelt</span><br/>
		</div>
	</div>

    <div class="form-group">
    {!! Form::button('Redaguoti įrašą',['class'=>'btn btn-primary form-control', 'id'=>'submit-all']) !!}
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