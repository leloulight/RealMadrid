@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Pozicijos</h3>
  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Sutrumpinimas</th>
            <th>Redaguoti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($positions as $position)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $position->title !!}</td>
            <td>{!! $position->shortcode !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/positions/{!! $position->id !!}/edit">Redaguoti</a>
            </td>        
         </tr>
         @endforeach
        </tbody>

  </table>

</div>




@endsection