<!DOCTYPE html>
<html>
    <head>
        <title>Golf League</title>
        <link rel="stylesheet" href="<?php echo asset('jquery-ui-1.10.4.custom/css/blitzer/jquery-ui-1.10.4.custom.css')?>" />
        <link rel="stylesheet" href="<?php echo asset('jquerymultiselect/jquery.multiselect.css')?>" />
    </head>
    <body>
        <form id="scoreForm">
            <label for="date">Date:</label>
            <input type="text" id="date" class="ui-corner-all" name="date" />
            <br />
            <label for="purse">Purse:</label>
            <input type="text" name="purse" class="ui-corner-all" id="purse" />
            <br />
            <label for="course">Course:</label>
            <select name="course" class="ui-corner-all" id="course">
                <option></option>
            </select>
            <br />
			<label for="players">Number of players:</label>
            <select name="players" class="ui-corner-all" id="players">
                <option></option>
            </select>
            <br /><br>
			<div name="playersList" id="playersList">
			</div>
			<br /><br /><br /><br />
            <input type="button" id="submitForm" onclick="submitScoreForm();" value="Create League Match" />
        </form>
        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-1.10.2.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquerymultiselect/jquery.multiselect.min.js')?>" type="text/javascript"></script>
        <script>
            $("#date").datepicker();
			
			$(document).ready(function() {                
                $.getJSON("{{URL::to('/')}}/courses", function(data){
                    $.each(data, function(index, text) {
                    $("#course").append(
                        $("<option></option>").val(text.id).html(text.name)
                        );
                    });
                });
				$.getJSON("{{URL::to('/')}}/players", function(data){
					players = data;                    
                });
				$.getJSON("{{URL::to('/')}}/levels", function(data){
                    levels = data;
                });
				for (i = 1; i < 13; i++) {
					$("#players").append($("<option>1</option>").val(i).html(i));
				}
				
				$(".group").append($("<option>1</option>").val('1').html('1'));
				$(".group").append($("<option>2</option>").val('2').html('2'));
				$(".group").append($("<option>3</option>").val('3').html('3'));
				
				$("#players")
				  .change(function () {
						$('#playersList').empty();
						for (i = $(this).val(); i > 0; i--) {
							$('#playersList').append('<div name="player"><label for="player">Player</label><select name="player_id[]" class="player ui-corner-all" id="player"></select><label for="level">Level</label><select name="level_id[]" class="level ui-corner-all" id="level" ></select><label for="group">Group</label><select name="group[]" class="group ui-corner-all" id="group" ></select></div><br />'); //add player div
						}
						$.each(players, function(index, text) {
							$(".player").append(
								$("<option></option>").val(text.id).html(text.name)
							);
						});
						$.each(levels, function(index, text) {
							$(".level").append(
								$("<option></option>").val(text.id).html(text.name)
							);
						});	
				  })
				  .change();
            });
            function submitScoreForm() {
                $.ajax({
                    url:    "{{URL::to('/')}}/matches",
                    type:   "post",
                    data:   $("#scoreForm").serializeArray()
                });
            }
        </script>
    </body>
</html>