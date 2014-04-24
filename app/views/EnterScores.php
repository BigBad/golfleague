<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
<body>
<form id ="scoreForm" action="">
	<label>Player:</label><br>
    <select name ="player" class="ui-corner-all" id="player">
		<option ></option>
    </select><br></br>
 
    <label>Date:</label><br>
    <input name="date" class="ui-corner-all" id="date"></input>
	
	<br></br>
    <label>Course:</label><br>
    <select name="course" class="ui-corner-all" id="course">
		<option></option>
    </select><br><br>
    <table border="1" id="course_table"><tr><th>Scores</th></tr>
        <tr>
			<td>Hole 1</td>
			<td>Hole 2</td>
			<td>Hole 3</td>
			<td>Hole 4</td>
			<td>Hole 5</td>
			<td>Hole 6</td>
			<td>Hole 7</td>
			<td>Hole 8</td>
			<td>Hole 9</td>
        </tr>
        <tr>
			<td id="hole_1"><input name="hole_1" type="number" style="width:40px" ></input></td>
			<td id="hole_2"><input name="hole_2" type="number" style="width:40px" ></input></td>
			<td id="hole_3"><input name="hole_3" type="number" style="width:40px" ></input></td>
			<td id="hole_4"><input name="hole_4" type="number" style="width:40px" ></input></td>
			<td id="hole_5"><input name="hole_5" type="number" style="width:40px" ></input></td>
			<td id="hole_6"><input name="hole_6" type="number" style="width:40px" ></input></td>
			<td id="hole_7"><input name="hole_7" type="number" style="width:40px" ></input></td>
			<td id="hole_8"><input name="hole_8" type="number" style="width:40px" ></input></td>
			<td id="hole_9"><input name="hole_9" type="number" style="width:40px" ></input></td>
        </tr>       
    </table>
	<br>
	</form>
	<button onClick='submitScoreForm()'>Post Score</button>
	

	<link rel="stylesheet" href="<?php echo asset('jquery-ui-1.10.4.custom/css/blitzer/jquery-ui-1.10.4.custom.css')?>"></link>
	<script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-1.10.2.js')?>" type="text/javascript"></script>
	<script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js')?>" type="text/javascript"></script>
	<script>
	$("#date").datepicker();
	$( "button" ).button();	
	</script>
	<script>
	$(document).ready(function() {
		$.getJSON("players/getPlayers", function(data){
			$.each(data, function(index, text) {
			$('#player').append(
				$('<option></option>').val(text.id).html(text.name)
				);
			});
		});
		$.getJSON("courses/getCourses", function(data){
			$.each(data, function(index, text) {
			$('#course').append(
				$('<option></option>').val(text.id).html(text.name)
				);
			});
		});
	});
	</script>
	<script language="javascript" type="text/javascript">
    function submitScoreForm() {
	    $.ajax({
			url:        'enterScore',
			type:       'post',
			data:	$('#scoreForm').serialize()
		});
	   
	   
    }
</script>
</body>
</html>
