function getFixtureLeague(result){
        var html = "";
        for(i in result){
            var league = result[i];
            html += '<option value="'+league.id+'">'+league.title+'</option>'
        }
        $("#league_id").html(html);
}

    
  //  $('#leaguefixtureFormUpload').submit(function (e) {
        /*var CSRF_TOKEN = $('#leaguefixtureFormUpload input[name="_token"]').val();  
       
       var form = $('#leaguefixtureFormUpload').serialize();               
        var FormData = new FormData($('#leaguefixtureFormUpload')[0]);

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: FormData,
            success: function (result) {
                getFixtureLeague(result);
            }
        });
        e.preventDefault();*/
   // });

/*$(document).on("submit", "#leaguefixtureFormUpload", function (e) {
        e.preventDefault();

        var form = $('#leaguefixtureFormUpload');               
        var FormData = new FormData(form[0]);

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: FormData,
            success: function (result) {
                getFixtureLeague(result);
            }
        });
       

    });*/

$(document).ready(function(){
    //Program a custom submit function for the form
    $("#leaguefixtureFormUpload").submit(function(event){
     
      //disable the default form submission
      event.preventDefault();
     
      //grab all form data  
      var formData = new FormData($(this)[0]);
     
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            getFixtureLeague(result);
            $("#myfixturesLeagueModal").modal("hide");
            $("#league_title").val(" ");
            showMessage("", "Prideta!", "success");
        }
      });
     
      return false;
    });

});