@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Šalys</h3>
  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Pavadinimas</th>
            <th>Vėliava</th>
            <th>Redaguoti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($countries as $country)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $country->title !!}</td>
            <td><img src="/{!! $country->flag_path.$country->flag_name !!}" width="50px" title="{!! $country->title !!}"/></td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/countries/{!! $country->id !!}/edit">Redaguoti</a>
            </td>
           
         </tr>
         @endforeach
        </tbody>

  </table>

</div>




@endsection