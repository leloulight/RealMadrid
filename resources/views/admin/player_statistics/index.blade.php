@extends('admin')

@section('admin_content')

<div class="table-responsive">
  <h3 class="text-center">Žaidėjai</h3>
  <table class="table table-striped table-hover" id="players-statistics-list-table">
  <div class="col-md-6 col-md-offset-3">
 
  <select name="season" id="season-select" class="form-control">
  @foreach($seasons as $season)
    <option value="{!! $season->id !!}">{!! $season->title !!}</option>
    @endforeach
  </select>

  </div>
    <thead>
          <tr>
            <th>#</th>
            <th>Vardas</th>
            <th>Pavardė</th>
            <th>Šalis</th>
            <th>Pozicija</th>
            <th>Įvarčiai</th>
            <th>Rez.perdavimai</th>
            <th>Redaguoti</th>
            <th>Ištrinti</th>
          </tr>
        </thead>

        <tbody id="season-players-list">
       
        </tbody>
  </table>

</div>


<!-- Modal -->
<div id="myPlayersDeleteModal" class="modal fade" role="dialog">
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

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">

  $(document).ready(function() {
    getPlayersBySeason($("#season-select").val());

    $(document).on('change', '#season-select', function(){
      getPlayersBySeason($(this).val());
    });
  });

  function getPlayersBySeason (season_id) {
    $.ajax({
      type: "POST",
      url: '/dashboard/players/statistics/getPlayerStatisticsBySeason/'+season_id,
      data: {_token: "{!! csrf_token() !!}" }, 
      success: function(data)
      {
        var block = $("#season-players-list");
        block.text("");
        $.each( data, function( key, value ) {
          var tr = $("<tr/>").attr('id', 'players-list');
          var th = $("<th/>").attr("scope", "row").text(key+1);
          tr.append(th);
          tr.append(
            $("<td/>").text(value.player_name)
          ).append(
            $("<td/>").text(value.last_name)
          ).append(
            $("<td/>").text(value.country_title)
          ).append(
            $("<td/>").text(value.position_title)
          ).append(
            $("<td/>").text(value.player_goals)
          ).append(
            $("<td/>").text(value.player_assists)
          ).append(
            $("<td/>").append(
              $("<i/>").addClass("fa fa-pencil-square-o")
            ).append(
              $("<a/>").attr('href', '/dashboard/players/statistics/'+value.player_id+'/edit').text("Redaguoti")
            )
          ).append(
            $("<td/>").append(
              $("<button/>").addClass("btn btn-danger").attr({"data-toggle": "modal", "data-target": "#myPlayersDeleteModal"}).attr('player-id', value.player_id).text("Ištrinti")
            )
          );
          block.append(tr);
        });
      }
    });
  }
</script>
@endsection