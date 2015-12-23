/***** League creation starts *****/
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

/***** League creation finished *****/


/***** Stadium creation starts *****/

 $('#stadiumfixtureFormUpload').submit(function (e) {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (result) {
                var html = "";
                for(i in result){
                    var stadium = result[i];
                    html += '<option value="'+stadium.id+'">'+stadium.title+'</option>'
                }
                $("#stadium_id").html(html);
                //console.log("#fixtureStadium");
                $("#fixtureStadium").html(html);

                $("#stadium_title").val(" ");
                $("#myfixturesStadiumModal").modal("hide");
                showMessage("", "Prideta!", "success");
               //getAllCategories();
            }
        });
        e.preventDefault();
    });

/***** Stadium creation finished *****/


/***** Team creation stadium creation starts *****/

 $('#stadiumteamFormUpload').submit(function (e) {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (result) {
                var html = "";
                for(i in result){
                    var stadium = result[i];
                    html += '<option value="'+stadium.id+'">'+stadium.title+'</option>'
                }
                $("#teamCreate-stadiums").html(html);

                $("#stadium_title").val(" ");
                $("#myteamStadiumModal").modal("hide");
                showMessage("", "Pridėta!", "success");
               //getAllCategories();
            }
        });
        e.preventDefault();
    });

/***** Stadium creation finished *****/



/***** Team creation starts *****/
function getFixtureTeam(result){
        var html = "";
        for(i in result){
            var team = result[i];
            html += '<option value="'+team.id+'">'+team.title+'</option>'
        }
        $("#team_id").html(html);
}

    
 
$(document).ready(function(){
    //Program a custom submit function for the form
    $("#teamfixtureFormUpload").submit(function(event){
     
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
            getFixtureTeam(result);
            $("#myfixturesTeamModal").modal("hide");
            $("#team_title").val(" ");
            showMessage("", "Prideta!", "success");
        }
      });
     
      return false;
    });

});

/***** Team creation finished *****/


/***** Player country creation starts *****/

 $('#playerCountryFormUpload').submit(function (e) {
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (result) {
                var html = "";
                for(i in result){
                    var country = result[i];
                    html += '<option value="'+country.id+'">'+country.title+'</option>'
                }
                $("#playerCountry").html(html);

                $("#country_title").val(" ");
                $("#myplayerCountryModal").modal("hide");
                showMessage("", "Pridėta!", "success");
            }
        });
        e.preventDefault();
    });

/***** Country creation finished *****/