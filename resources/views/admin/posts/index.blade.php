@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Rodomi įrašai</h3>
  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Kategorija</th>
            <th>Autorius</th>
            <th>Rodoma nuo</th>
            <th>Redaguoti</th>
            <th>Nerodyti</th>
            <th>Ištrinti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($publishedPosts as $post)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
       
            <td>{!! $post->title !!}</td>
            <td>{!! $post->category->title !!}</td>
            <td>{!! $post->user->name !!}</td>    
            <td>{!! $post->published_at !!}</td>  
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/posts/{!! $post->id !!}/edit">Redaguoti</a>
            </td>
            <td><input type="checkbox"/></td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#myDeleteModal" post-id="{!! $post->id !!}">Ištrinti</button></td>
         </tr>
         @endforeach
        </tbody>

  </table>
  {!! $publishedPosts->render() !!}

</div>


<!-- Modal -->
<div id="myDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti įrašą</h4>
      </div>
      <div class="modal-body">
        Ar tikrai norite ištrinti įrašą ? 
      </div>
      <div class="modal-footer">
      <form action="" id="modal-delete-form" method="POST">
      {{ csrf_field() }}
      	<input type="hidden" name="_method" value="DELETE">
     <button type="submit" class="btn btn-danger">Delete</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
        </form>
      </div>
    </div>

  </div>
</div>

<div class="table-responsive">
	<h3 class="text-center">Dar nerodomi įrašai</h3>
  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Kategorija</th>
            <th>Autorius</th>
            <th>Rodoma nuo</th>
            <th>Redaguoti</th>
            <th>Nerodyti</th>
            <th>Ištrinti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($unpublishedPosts as $post2)
        {{--*/ $i++; /*--}}
         
          <tr>
         
            <th scope="row">{!! $i !!}</th>
       
            <td>{!! $post2->title !!}</td>
            <td>{!! $post2->category->title !!}</td>
            <td>{!! $post2->user->name !!}</td>    
            <td>{!! $post2->published_at !!}</td>  
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/posts/{!! $post2->id !!}/edit">Redaguoti</a>
            </td>
            <td><input type="checkbox"/></td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#myDeleteModal" post-id="{!! $post2->id !!}">Ištrinti</button></td>
         </tr>
         @endforeach
        </tbody>

  </table>
  {!! $unpublishedPosts->render() !!}

</div>




@endsection