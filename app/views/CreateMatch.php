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
            <label for="skins_a">Skins A:</label>
            <input type="text" name="skins_a" class="ui-corner-all" id="skins_a" />
            <label for="skins_b">Skins B:</label>
            <input type="text" name="skins_b" class="ui-corner-all" id="skins_b" />
            <br />
            <label for="gross">Gross:</label>
            <input type="text" name="gross" class="ui-corner-all" id="gross" />
            <br />
            <label for="net">Net:</label>
            <input type="text" name="net" class="ui-corner-all" id="net" />
            <br />
            <label for="course">Course:</label>
            <select name="course" class="ui-corner-all" id="course">
                <option></option>
            </select>
            <br />
            <label for="player">Players</label>
            <select name="player[]" class="ui-corner-all" id="player" multiple="multiple"></select>
            <br />
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
                $.getJSON("players/getPlayers", function(data){
                    $.each(data, function(index, text) {
                        $("#player").append(
                            $("<option></option>").val(text.id).html(text.name)
                        );
                    });
                    setMultiselect("player");
                });
                $.getJSON("courses/getCourses", function(data){
                    $.each(data, function(index, text) {
                    $("#course").append(
                        $("<option></option>").val(text.id).html(text.name)
                        );
                    });
                });
            });
            function submitScoreForm() {
                $.ajax({
                    url:    "enterScore",
                    type:   "post",
                    data:   $("#scoreForm").serialize()
                });
            }
        </script>
    </body>
</html>