<!-- Modal -->
<div id="myfixturesLeagueModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-center">Jei neradai tinkamos lygos - sukurk čia</h4>
      </div>
      <div class="modal-body">

      <div class=" col-md-8 col-md-offset-2">
       <form method="POST" action="/dashboard/leagues/fixtureLeague" id="leaguefixtureFormUpload" enctype="multipart/form-data">

      {!! csrf_field() !!}
        <br/>
        <div class="form-group">
        {!! Form::label('league_title','Pavadinimas : ') !!}
        {!! Form::text('league_title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
          <label>Lygos logo:</label><br/>
          <input type="file" name="file" id="file" class="inputfile" accept="image/*" />
          <label for="file">
          <i class="fa fa-cloud-upload"></i>
          Įkelti nuotrauką</label>
          <span id="file_upload"></span>
        </div>
     
        <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Sukurti lygą</button>
        </div>
      
       </form>
    </div>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
<!-- Modalo pabaiga -->

<!-- Modal -->
<div id="myfixturesStadiumModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-center">Jei neradai tinkamo stadiono - sukurk čia</h4>
      </div>
      <div class="modal-body">

      <div class=" col-md-8 col-md-offset-2">
       <form method="POST" action="/dashboard/stadiums/fixtureStadiums" id="stadiumfixtureFormUpload">

      {!! csrf_field() !!}
        <br/>
        <div class="form-group">
        {!! Form::label('stadium_title','Pavadinimas : ') !!}
        {!! Form::text('stadium_title',null,['class'=>'form-control', 'id'=>'stadium_title']) !!}
        </div>
     
        <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Sukurti stadioną</button>
        </div>
      
       </form>
    </div>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
<!-- Modalo pabaiga -->


<!-- Modal -->
<div id="myfixturesTeamModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-center">Jei neradai tinkamos komandos - sukurk čia</h4>
      </div>
      <div class="modal-body">

      <div class=" col-md-8 col-md-offset-2">
       <form method="POST" action="/dashboard/teams/fixtureTeam" id="teamfixtureFormUpload" enctype="multipart/form-data">

      {!! csrf_field() !!}

        <div class="form-group">
        {!! Form::label('team_title','Pavadinimas : ') !!}
        {!! Form::text('team_title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
        <label for="stadium_id">Stadionas :</label>
          <select class="form-control" name="stadium_id" id="fixtureStadium">
          @foreach($stadiums as $stadium)
            <option value="{!! $stadium->id !!}">{!! $stadium->title !!}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Komandos logo:</label><br/>
          <input type="file" name="file" id="team_logo" class="inputfile" accept="image/*" />
          <label for="team_logo">
          <i class="fa fa-cloud-upload"></i>
          Įkelti nuotrauką</label>
          <span id="team_logo_upload"></span>
        </div>
     
        <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Sukurti komandą</button>
        </div>
      
       </form>
    </div>

      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>
<!-- Modalo pabaiga -->



