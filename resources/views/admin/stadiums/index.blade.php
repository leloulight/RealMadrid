@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Stadionai</h3>
  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Redaguoti</th>
            <th>Ištrinti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($stadiums as $stadium)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $stadium->title !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/stadiums/{!! $stadium->id !!}/edit">Redaguoti</a>
            </td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#myStadiumDeleteModal" stadium-id="{!! $stadium->id !!}">Ištrinti</button></td>
         </tr>
         @endforeach
        </tbody>

  </table>

</div>


<!-- Modal -->
<div id="myStadiumDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti stadioną</h4>
      </div>
      <div class="modal-body">
        Ar tikrai norite ištrinti stadioną ? 
      </div>
      <div class="modal-footer">
      <form action="" id="modal-stadium-delete-form" method="POST">
      {{ csrf_field() }}
      	<input type="hidden" name="_method" value="DELETE">
     <button type="submit" class="btn btn-danger">Ištrinti</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
        </form>
      </div>
    </div>

  </div>
</div>


@endsection