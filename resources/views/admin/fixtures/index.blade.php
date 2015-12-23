@extends('admin')

@section('admin_content')

<div class="table-responsive">
  <h3 class="text-center">Artimiausios rungtynės</h3>

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
    
        @foreach($comingFixtures as $upcoming)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $upcoming->team1_title !!}</td>
            <td><img src="/{!! $upcoming->team1_logo_path.$upcoming->team1_logo_name !!}" width="50px" /></td>
            <td>{!! $upcoming->team2_title !!}</td>
            <td><img src="/{!! $upcoming->team2_logo_path.$upcoming->team2_logo_name !!}" width="50px" /></td>
            <td class="text-center">{!! $upcoming->team_1_score !!}</td>
            <td class="text-center">{!! $upcoming->team_2_score !!}</td>
            <td class="text-center">{!! $upcoming->fixture_date !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/fixtures/{!! $upcoming->fixture_id !!}/edit">Redaguoti</a>
            </td>
         </tr>
         @endforeach
        </tbody>
  {!! $comingFixtures->render() !!}
  </table>

</div>



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
    @if(count($latestFixtures) > 0)
        @foreach($latestFixtures as $latest)
        {{--*/ $i++; /*--}}
        
          <tr>
         
            <th scope="row">{!! $i !!}</th>
            <td>{!! $latest->team1_title !!}</td>
            <td><img src="/{!! $latest->team1_logo_path.$latest->team1_logo_name !!}" width="50px" /></td>
            <td>{!! $latest->team2_title !!}</td>
            <td><img src="/{!! $latest->team2_logo_path.$latest->team2_logo_name !!}" width="50px" /></td>
            <td class="text-center">{!! $latest->team_1_score !!}</td>
            <td class="text-center">{!! $latest->team_2_score !!}</td>
            <td class="text-center">{!! $latest->fixture_date !!}</td>
            <td>
            <i class="fa fa-pencil-square-o"></i>
            <a href="/dashboard/fixtures/{!! $latest->fixture_id !!}/edit">Redaguoti</a>
            </td>
         </tr>
         @endforeach
       @else
       <h3 class="text-center">Nėra rungtynių...</h3>   
       @endif
        </tbody>
  {!! $latestFixtures->render() !!}
  </table>

</div>


<!-- Modal -->
<div id="myLeagueDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti lygą</h4>
      </div>
      <div class="modal-body">
        Ar tikrai norite ištrinti lygą ? 
      </div>
      <div class="modal-footer">
      <form action="" id="modal-league-delete-form" method="POST">
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