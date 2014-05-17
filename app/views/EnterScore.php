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
				<td>Hole </td>
				<td> </td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

			<tr>
				<td id="hole_1">
					<input name="hole_1" type="number" style="width:40px" ></input>
					<input id="hole_1_id" name="hole_1_id" type="hidden"></input>
				</td>
				<td id="hole_2">
					<input name="hole_2" type="number" style="width:40px" ></input>
					<input id="hole_2_id" name="hole_2_id" type="hidden"></input>
				</td>
				<td id="hole_3">
					<input name="hole_3" type="number" style="width:40px" ></input>
					<input id="hole_3_id"  name="hole_3_id" type="hidden"></input>
				</td>
				<td id="hole_4">
					<input name="hole_4" type="number" style="width:40px" ></input>
					<input id="hole_4_id" name="hole_4_id" type="hidden"></input>
				</td>
				<td id="hole_5">
					<input name="hole_5" type="number" style="width:40px" ></input>
					<input id="hole_5_id" name="hole_5_id" type="hidden"></input>
				</td>
				<td id="hole_6">
					<input name="hole_6" type="number" style="width:40px" ></input>
					<input id="hole_6_id" name="hole_6_id" type="hidden"></input>
				</td>
				<td id="hole_7">
					<input name="hole_7" type="number" style="width:40px" ></input>
					<input id="hole_7_id" id="hole_9_id" name="hole_7_id" type="hidden"></input>
				</td>
				<td id="hole_8">
					<input name="hole_8" type="number" style="width:40px" ></input>
					<input id="hole_8_id" name="hole_8_id" type="hidden"></input>
				</td>
				<td id="hole_9">
					<input name="hole_9" type="number" style="width:40px" ></input>
					<input id="hole_9_id" name="hole_9_id" type="hidden"></input>
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
			$('#course').on('change', function() {
				var course_id = $("#course").val();
				$.getJSON("holes/getHoles", { course_id: course_id }, function(data){
				var i=1;
				$.each(data, function(index, text) {					
					$("#hole_" + i + "_id").val(text.id);
					var valu = $("#hole_" + i + "_id").val();
					i++;
				});
			});
				
			});

            function submitScoreForm() {
                $.ajax({
                    url:    "storescore",
                    type:   "post",
                    data:   $("#scoreForm").serialize()
                });
            }
        </script>
    </body>
</html>