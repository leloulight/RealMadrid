@extends('admin')

@section('admin_content')

<div class="table-responsive">
  <h3 class="text-center">Žaidėjai</h3>
  <table class="table table-striped table-hover" id="players-list-table">
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
        <th>Numeris</th>
        <th>Šalis</th>
        <th>Pozicija</th>
        <th>Redaguoti</th>
        <th>Ištrinti</th>
      </tr>
    </thead>
    <tbody id="season-players-list"></tbody>
  </table>
</div>


<!-- Modal -->
<div id="myPlayersDeleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ištrinti žaidėją</h4>
      </div>
      <div class="modal-body"> Ar tikrai norite ištrinti žaidėją ? </div>
      <div class="modal-footer">
        <form action="" id="modal-player-delete-form" method="POST">
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
      url: '/dashboard/seasons/getPlayerBySeason2/'+season_id,
      data: {_token: "{!! csrf_token() !!}" }, 
      success: function(data)
      {
        var block = $("#season-players-list").text("");

        $.each( data, function( key, value ) {
          var tr = $("<tr/>").attr('id', 'players-list').appendTo(block);
          var th = $("<th/>").attr("scope", "row").text(key+1).appendTo(tr);

          $("<td/>").text(value.player_name).appendTo(tr);
          $("<td/>").text(value.last_name).appendTo(tr);
          $("<td/>").text(value.player_number).appendTo(tr);
          $("<td/>").text(value.country_title).appendTo(tr);
          $("<td/>").text(value.position_title).appendTo(tr);

          var edit = $("<td/>").appendTo(tr);
          $("<i/>").addClass("fa fa-pencil-square-o").appendTo(edit);
          $("<a/>").attr('href', '/dashboard/players/'+value.player_id+'/edit').text("Redaguoti").appendTo(edit);
          
          var del = $("<td/>").appendTo(tr);
          $("<button/>").addClass("btn btn-danger").attr({"data-toggle": "modal", "data-target": "#myPlayersDeleteModal", "player-id": value.player_id}).text("Ištrinti").appendTo(del);
        });
      }
    });
  }
</script>
@endsection