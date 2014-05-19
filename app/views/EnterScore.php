<!DOCTYPE html>
<html>
<style type="text/css">

</style>
    <head>
        <title>Golf League</title>
        <link rel="stylesheet" href="<?php echo asset('jquery-ui-1.10.4.custom/css/blitzer/jquery-ui-1.10.4.custom.css')?>" />
        <link rel="stylesheet" href="<?php echo asset('jquerymultiselect/jquery.multiselect.css')?>" />
    </head>
    <body>
        <form id="scoreForm">
            <label for="date">Date:</label>
            <input type="text" id="date" class="ui-corner-all" name="date" />
            <br /><br>
			
            <label for="player">Player:</label>
            <select name="player" class="ui-corner-all" id="player">
                <option></option>
            </select>
            <br /><br>
			
			<label for="course">Course:</label>
            <select name="course" class="ui-corner-all" id="course">
                <option></option>
            </select>
            <br /><br>
			
		<table border="1" id="course_table"><tr><th>Scores</th></tr>
			<tr>
			<td>Hole:</td>
				<td id="number_1"></td>
				<td id="number_2"> </td>
				<td id="number_3"> </td>
				<td id="number_4"> </td>
				<td id="number_5"> </td>
				<td id="number_6"> </td>
				<td id="number_7"> </td>
				<td id="number_8"> </td>
				<td id="number_9"> </td>
			</tr>
			<tr>
				<td>Par</td>
				<td id="par_1"></td>
				<td id="par_2"></td>
				<td id="par_3"></td>
				<td id="par_4"></td>
				<td id="par_5"></td>
				<td id="par_6"></td>
				<td id="par_7"></td>
				<td id="par_8"></td>
				<td id="par_9"></td>
			</tr>			
			<tr>
				<td>HCap</td>
				<td id="handi_1"></td>
				<td id="handi_2"></td>
				<td id="handi_3"></td>
				<td id="handi_4"></td>
				<td id="handi_5"></td>
				<td id="handi_6"></td>
				<td id="handi_7"></td>
				<td id="handi_8"></td>
				<td id="handi_9"></td>
			</tr>
			<tr>
				<td>Yards</td>
				<td id="yards_1"></td>
				<td id="yards_2"></td>
				<td id="yards_3"></td>
				<td id="yards_4"></td>
				<td id="yards_5"></td>
				<td id="yards_6"></td>
				<td id="yards_7"></td>
				<td id="yards_8"></td>
				<td id="yards_9"></td>
			</tr>
			<tr>
				<td>Score</td>
				<td id="hole_1">
					<input id="hole_id_1" name="hole_id_1" type="hidden"></input>
					<input id="score_1" name="hole_1" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_2">
					<input id="hole_id_2" name="hole_id_2" type="hidden"></input>
					<input id="score_2" name="hole_2" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_3">
					<input id="hole_id_3"  name="hole_id_3" type="hidden"></input>
					<input id="score_3" name="hole_3" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_4">
					<input id="hole_id_4" name="hole_id_4" type="hidden"></input>
					<input id="score_4" name="hole_4" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_5">
					<input id="hole_id_5" name="hole_id_5" type="hidden"></input>
					<input id="score_5" name="hole_5" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_6">
					<input id="hole_id_6" name="hole_id_6" type="hidden"></input>
					<input id="score_6" name="hole_6" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_7">
					<input id="hole_id_7"  name="hole_id_7" type="hidden"></input>
					<input id="score_7" name="hole_7" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_8">
					<input id="hole_id_8" name="hole_id_8" type="hidden"></input>
					<input id="score_8" name="hole_8" type="number" style="width:40px" ></input>					
				</td>
				<td id="hole_9">
					<input id="hole_id_9" name="hole_id_9" type="hidden"></input>
					<input id="score_9" name="hole_9" type="number" style="width:40px" ></input>					
				</td>
				<td>
					<input id="total" name="total"  style="width:40px" ></input>					
				</td>
			</tr>       
 	    </table>
		 <input type="button" id="submitForm" onclick="submitScoreForm();" value="Submit Score" />
        </form>
        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-1.10.2.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquerymultiselect/jquery.multiselect.min.js')?>" type="text/javascript"></script>
        <script>
            $("#date").datepicker({ dateFormat: 'yy-mm-dd' });
            $("button, input[type=button]").button();
           
			$.getJSON("players/getPlayers", function(data){
				$.each(data, function(index, text) {
				$("#player").append(
					$("<option></option>").val(text.id).html(text.name)
					);
				});
			});
			
			$.getJSON("courses/getCourses", function(data){
				$.each(data, function(index, text) {
				$("#course").append(
					$("<option></option>").val(text.id).html(text.name)
					);
				});
			});
			//when course is selected get holes for the course and populate data
			$("#course").on("change", function() {
				var course_id = $("#course").val();
				$.getJSON("holes/getHoles", { course_id: course_id }, function(data){
				var i=1;
				$.each(data, function(index, text) {					
					$("#number_" + i).html(text.number);
					$("#hole_id_" + i).val(text.id);
					$("#par_" + i).html(text.par);
					$("#handi_" + i).html(text.handicap);
					$("#yards_" + i).html(text.yards);
					i++;
				});
			});
				
			});

            function submitScoreForm() {
				//total hole scores
				var score = 0;
				for(i = 10; --i > 0;) {
					score += document.getElementById("score_" + i ).value | 0;
				}
				$("#total").val(score);
					  
					$.ajax({
						url:    "storescore",
						type:   "post",
						data:   $("#scoreForm").serialize(),
						success: document.getElementById("scoreForm").reset()
					});
            }
        </script>
    </body>
</html>