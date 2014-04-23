<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
<body><div class="container_12">
<form name= "scoreForm" id ="score" action ="enterScore" method="post">
<div id="scores" class="">
	<label>Player:</label><br>
    <select class="ui-corner-all" id="player">
    <option></option>
    </select><br><br> 
    <label>Date:</label><br>
    <input class="ui-corner-all" id="date">
    <option></option>
    </input>
   <label>Course:</label><br>
    <select class="ui-corner-all" id="course">
    <option></option>
    </select><br><br>
    <table border="1" id="course_table"> Scores
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
			<td id="hole_1"><input type="number" style="width:40px" ></input></td>
			<td id="hole_2"><input type="number" style="width:40px" ></input></td>
			<td id="hole_3"><input type="number" style="width:40px" ></input></td>
			<td id="hole_4"><input type="number" style="width:40px" ></input></td>
			<td id="hole_5"><input type="number" style="width:40px" ></input></td>
			<td id="hole_6"><input type="number" style="width:40px" ></input></td>
			<td id="hole_7"><input type="number" style="width:40px" ></input></td>
			<td id="hole_8"><input type="number" style="width:40px" ></input></td>
			<td id="hole_9"><input type="number" style="width:40px" ></input></td>
        </tr>       
    </table>
	<br>
	
	<button>Post Score</button>
</form>
</div>
	<link rel="stylesheet" href="<?php echo asset('jquery-ui-1.10.4.custom/css/blitzer/jquery-ui-1.10.4.custom.css')?>">
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

</body>
</html>




