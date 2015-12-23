<!-- Modal -->
<div id="myteamStadiumModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-center">Jei neradai tinkamo stadiono - sukurk čia</h4>
      </div>
      <div class="modal-body">

      <div class=" col-md-8 col-md-offset-2">
       <form method="POST" action="/dashboard/stadiums/teamStadiums" id="stadiumteamFormUpload">

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