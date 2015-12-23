@extends('admin')

@section('admin_content')

<div class="table-responsive">
	<h3 class="text-center">Paskutinės rungtynės</h3>

  <table class="table table-striped table-hover">

    <thead>
          <tr>
            <th>#</th>
            <th>Namų komanda</th>
            <th>Logo</th>
            <th>Svečių komanda</th>
            <th>Logo</th>
            <th>Rezultatas 1</th>
            <th>Rezultatas 2</th>
            <th>Data</th>
            <th>Redaguoti</th>
          </tr>
        </thead>

        <tbody>
       {{--*/ $i = 0 /*--}}
		
        @foreach($fixtures as $fixture)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $fixture->team1_title !!}</td>
            <td><img src="/{!! $fixture->team1_logo_path.$fixture->team1_logo_name !!}" width="50px" /></td>
            <td>{!! $fixture->team2_title !!}</td>
            <td><img src="/{!! $fixture->team2_logo_path.$fixture->team2_logo_name !!}" width="50px" /></td>
            <td class="text-center">{!! $fixture->team_1_score !!}</td>
            <td class="text-center">{!! $fixture->team_2_score !!}</td>
            <td class="text-center">{!! $fixture->fixture_date !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/fixtures/{!! $fixture->fixture_id !!}/edit">Redaguoti</a>
            </td>
         </tr>
         @endforeach
        </tbody>

  </table>

</div>

@endsection