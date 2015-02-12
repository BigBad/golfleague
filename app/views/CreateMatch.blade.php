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
            <label for="player_1">Player</label>
            <select name="player_1" class="player ui-corner-all" id="player_1"></select>
			<label for="level_1">Level</label>
            <select name="level_1" class="level ui-corner-all" id="level_1" ></select>
			<label for="group_1">Group</label>
            <select name="group_1" class="group ui-corner-all" id="group_1" ></select>
            <br />
			<label for="player_2">Player</label>
            <select name="player_2" class="player ui-corner-all" id="player_2"></select>
			<label for="level_2">Level</label>
            <select name="level_2" class="level ui-corner-all" id="level_2" ></select>
			<label for="group_2">Group</label>
			<select name="group_2" class="group ui-corner-all" id="group_2" ></select>
            <br />
			<label for="player_3">Player</label>
            <select name="player_3" class="player ui-corner-all" id="player_3"></select>
			<label for="level_3">Level</label>
            <select name="level_3" class="level ui-corner-all" id="level_3" ></select>
			<label for="group_3">Group</label>
            <select name="group_3" class="group ui-corner-all" id="group_3" ></select>
            <br />
			<label for="player_4">Player</label>
            <select name="player_4" class="player ui-corner-all" id="player_4"></select>
			<label for="level_4">Level</label>
            <select name="level_4" class="level ui-corner-all" id="level_4" ></select>
			<label for="group_4">Group</label>
            <select name="group_4" class="group ui-corner-all" id="group_4" ></select>
            <br />
			<label for="player_5">Player</label>
            <select name="player_5" class="player ui-corner-all" id="player_5"></select>
			<label for="level_5">Level</label>
            <select name="level_5" class="level ui-corner-all" id="level_5" ></select>
			<label for="group_5">Group</label>
            <select name="group_5" class="group ui-corner-all" id="group_5" ></select>
            <br />
			<label for="player_6">Player</label>
            <select name="player_6" class="player ui-corner-all" id="player_6"></select>
			<label for="level_6">Level</label>
            <select name="level_6" class="level ui-corner-all" id="level_6" ></select>
			<label for="group_6">Group</label>
			<select name="group_6" class="group ui-corner-all" id="group_6" ></select>
            <br />
			<label for="player_7">Player</label>
            <select name="player_7" class="player ui-corner-all" id="player_7"></select>
			<label for="level_7">Level</label>
            <select name="level_7" class="level ui-corner-all" id="level_7" ></select>
			<label for="group_7">Group</label>
            <select name="group_7" class="group ui-corner-all" id="group_7" ></select>
            <br />
			<label for="player_8">Player</label>
            <select name="player_8" class="player ui-corner-all" id="player_8"></select>
			<label for="level_8">Level</label>
            <select name="level_8" class="level ui-corner-all" id="level_8" ></select>
			<label for="group">Group</label>
            <select name="group_8" class="group ui-corner-all" id="group_8" ></select>
            <br />
			<label for="player_9">Player</label>
            <select name="player_9" class="player ui-corner-all" id="player_9"></select>
			<label for="level_9">Level</label>
            <select name="level_9" class="level ui-corner-all" id="level_9" ></select>
			<label for="group_9">Group</label>
            <select name="group_9" class="group ui-corner-all" id="group_9" ></select>
            <br />
			<label for="player_10">Player</label>
            <select name="player_10" class="player ui-corner-all" id="player_10"></select>
			<label for="level">Level</label>
            <select name="level_10" class="level ui-corner-all" id="level_10" ></select>
			<label for="group">Group</label>
			<select name="group_10" class="group ui-corner-all" id="group_10" ></select>
            <br />
			<label for="player_11">Player</label>
            <select name="player_11" class="player ui-corner-all" id="player_11"></select>
			<label for="level_11">Level</label>
            <select name="level_11" class="level ui-corner-all" id="level_11" ></select>
			<label for="group_11">Group</label>
            <select name="group_11" class="group ui-corner-all" id="group_11" ></select>
            <br />
			<label for="player_12">Player</label>
            <select name="player_12" class="player ui-corner-all" id="player_12"></select>
			<label for="level_12">Level</label>
            <select name="level_12" class="level ui-corner-all" id="level_12" ></select>
			<label for="group_12">Group</label>
            <select name="group_12" class="group ui-corner-all" id="group_12" ></select>
            <br />


            <br />
			<br /><br /><br /><br />
            <input type="button" id="submitForm" onclick="submitScoreForm();" value="Create League Match" />
        </form>
        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-1.10.2.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquerymultiselect/jquery.multiselect.min.js')?>" type="text/javascript"></script>
        <script>
            $("#date").datepicker();
			
            $("button, input[type=button]").button();
            function setMultiselect(elementId) {
                $("#" + elementId).multiselect({
                    noneSelectedText: "Click here to select...",
                    selectedList: 4
                }).bind("multiselectclick multiselectcheckall multiselectuncheckall", function(event, ui) {
                        var checkedValues = $.map($(this).multiselect("getChecked"), function(input) {
                            return input.value;
                        });
                }).triggerHandler("multiselectclick");
            }
			
			$(document).ready(function() {
                $.getJSON("{{URL::to('/')}}/players", function(data){
                    $.each(data, function(index, text) {
                        $(".player").append(
                            $("<option></option>").val(text.id).html(text.name)
                        );
                    });
                    //setMultiselect("player");
                });
                $.getJSON("{{URL::to('/')}}/courses", function(data){
                    $.each(data, function(index, text) {
                    $("#course").append(
                        $("<option></option>").val(text.id).html(text.name)
                        );
                    });
                });
				$.getJSON("{{URL::to('/')}}/levels", function(data){
                    $.each(data, function(index, text) {
                    $(".level").append(
                        $("<option></option>").val(text.id).html(text.name)
                        );
                    });
                });
				$(".group").append($("<option>1</option>").val('1').html('1'));
				$(".group").append($("<option>2</option>").val('2').html('2'));
				$(".group").append($("<option>3</option>").val('3').html('3'));
            });
            function submitScoreForm() {
                $.ajax({
                    url:    "{{URL::to('/')}}/matches",
                    type:   "post",
                    data:   $("#scoreForm").serialize()
                });
            }
        </script>
    </body>
</html>