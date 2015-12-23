@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Sezonai</h3>
  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Pozicija</th>
            <th>Redaguoti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($seasons as $season)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $season->title !!}</td>
            <td>{!! $season->position !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/seasons/{!! $season->id !!}/edit">Redaguoti</a>
            </td>
            
         </tr>
         @endforeach
        </tbody>

  </table>

</div>





@endsection