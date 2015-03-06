@extends('template.base')

@section('title')
    Administration
@stop

@section('first-css')
<link href="<?php echo asset('LTE/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />
@stop

@section('page-header')
    Create Match
@stop

@section('breadcrumb')
    <li><a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><a href="{{ URL::to('matches/create') }}"><i class="fa fa-users"></i> Create Matche</a></li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header no-padding">
                </div>{{-- end .box-header --}}
                <div class="box-body">
                    <form role="form" id="scoreForm">
                        <div id="class="form-group">
                            <label for="date">Date:</label>
                            <input class="form-control" type="text" id="date" class="ui-corner-all" name="date" />
                        </div>
						<div id="class="form-group">
							<label for="course">Course:</label>
							<select class="form-control" name="course" class="ui-corner-all" id="course">
								<option></option>
							</select>
						</div>
						<div id="class="form-group" >
							<label for="players">Number of players:</label>
							<select class="form-control" name="players" class="ui-corner-all" id="players" >
								<option></option>
							</select>
						</div>
						<div id="class="form-group">
							<div id="pursediv">
								<label for="purse">Purse:</label>
								<input class="form-control" type="text" name="purse" class="ui-corner-all" id="purse" readonly />
							</div>
						</div>
						</br>
						<div id="class="form-group">
							<div name="playersList" id="playersList"></div>
						</div>
                    </form>
                </div>{{-- end .box-body --}}
					<div class="box-footer">
						<input class="btn btn-success btn-sm" type="button" id="submitForm" onclick="submitScoreForm();" value="Create" />
					</div>
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

@stop

@section('include-js')

@stop

@section('page-js')

        <script src="<?php echo asset('LTE/plugins/datepicker/bootstrap-datepicker.js')?>" type="text/javascript"></script>
        <script>
        $("#date").datepicker({
            autoclose : true
        });
		var players = [];
		var levels =[];
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
		for (i = 12; i > 0; i--) {
			$("#players").append($("<option></option>").val(i).html(i));
		}
		var groups = [1,2,3];

		$("#players")
		  .change(function () {
			$('#playersList').empty();
			for (i = 1;  i <= $(this).val(); i++) {
				$('#playersList').append('<div name="player"><label for="player">'+i+'</label><select name="player['+i+'][player_id]" class="player ui-corner-all" id="player"></select><label for="level">Level</label><select name="player['+i+'][level_id]" class="level ui-corner-all" id="level" ></select><label for="group">Group</label><select name="player['+i+'][group]" class="group ui-corner-all" id="group" ></select></div><br />'); //add player div
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
			for (i = 0; i < groups.length; i++) {
				$(".group").append(
					$("<option></option>").val(groups[i]).html(groups[i])
				);
			}
			//Determine purse and display
			var purse = 5 * $(this).val();
			$('#purse').val(purse);
		  }).change();
            });
            function submitScoreForm() {
                $.ajax({
                    url:    "{{URL::to('/')}}/matches",
                    type:   "post",
                    data:   $("#scoreForm").serializeArray()
                });
            }
        </script>
@stop

@section('onload')
<script>

</script>
@stop
