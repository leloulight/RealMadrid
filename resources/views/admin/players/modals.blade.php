<!-- Modal -->
<div id="myplayerCountryModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="text-center">Jei neradai tinkamos šalies - sukurk čia</h4>
      </div>
      <div class="modal-body">

      <div class=" col-md-8 col-md-offset-2">

      <form method="POST" action="/dashboard/countries/playerCountry" id="playerCountryFormUpload" enctype="multipart/form-data">

      {!! csrf_field() !!}

        <div class="form-group">
        {!! Form::label('country_title','Pavadinimas : ') !!}
        {!! Form::text('country_title',null,['class'=>'form-control', 'id'=>'country_title']) !!}
        </div>

        <div class="form-group">
          <label>Vėliava:</label><br/>
          <input type="file" name="ajax-country-flag" id="country_flag" class="inputfile" accept="image/*" />
          <label for="country_flag">
          <i class="fa fa-cloud-upload"></i>
          Įkelti vėliavą</label>
          <span id="country_upload"></span>
        </div>
     
        <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Sukurti šalį</button>
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

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#playerCountryFormUpload #country_flag").change(function() {
    var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
    $("#country_upload").text(fileName);
  });
  });
</script>