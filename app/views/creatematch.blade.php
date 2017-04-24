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
        <div class="col-md-7">
            <div class="box box-success">
                <div class="box-header no-padding">
                </div>{{-- end .box-header --}}
                <div class="box-body">
                    <form role="form" id="scoreForm">
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input class="form-control" type="text" id="date" class="ui-corner-all" name="date" />
                        </div>
						<div class="form-group">
							<label for="course">Course:</label>
							<select class="form-control" name="course" class="ui-corner-all" id="course">
								<option></option>
							</select>
						</div>

						<div class="form-group">
							<label for="teamRadios">Match Type:</label>
							<div class="radio">
								<label>
									<input type="radio" name="matchType" id="matchTypeBoth" value="both" >
									Team and Individual
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="matchType" id="matchTypeIndividual" value="individual">
									Individual Only
								</label>
							</div>
							<div class="radio">
								<label>
									<input type="radio" name="matchType" id="matchTypeTeam" value="team">
									Team Only
								</label>
							</div>
						</div>
						<div class="form-group" >
							<label for="players">Number of players:</label>
							<select class="form-control" name="players" class="ui-corner-all" id="players" >
								<option></option>
							</select>
						</div>

						<div class="form-group">
							<div id="pursediv">
								<label for="purse">Purse:</label>
								<input class="form-control" type="text" name="purse" class="ui-corner-all" id="purse" readonly />
							</div>
						</div>
						</br>
						<div class="form-group">
							<div name="playersList" id="playersList"></div>
						</div>
					    </br>
                        <div class="form-group">
                        <div id="teamMatchUp">
                            <div  name="teamMatchUps" id="teamMatchUps" hidden>
                                <label for="teamMatchUp1">Match Up 1:</label>
                                <div  id="teamMatchUp1" name ="teamMatchUp1">
                                    <div>
                                        <select class="team ui-corner-all" id="team1MatchUp1" name="teamMatchUp1[]" >
                                            <option></option>
                                        </select>
                                    </div>
                                    vs.
                                    <div>
                                        <select class="team ui-corner-all" id="team2MatchUp1" name="teamMatchUp1[]">
                                            <option></option>
                                        </select>
                                    </div>
                               </div>
                                </br>
                                <label for="teamMatchUp1">Match Up 2:</label>
                                <div  id="teamMatchUp1" name ="teamMatchUp2">
                                    <div>
                                        <select class="team ui-corner-all" id="team1MatchUp2" name="teamMatchUp2[]">
                                            <option></option>
                                        </select>
                                    </div>
                                    vs.
                                    <div>
                                        <select class="team ui-corner-all" id="team2MatchUp2" name="teamMatchUp2[]">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                </br>
                                <label for="teamMatchUp1">Match Up 3:</label>
                                <div  id="teamMatchUp1" name ="teamMatchUp3">
                                    <div>
                                        <select class="team ui-corner-all" id="team1MatchUp3" name="teamMatchUp3[]">
                                            <option></option>
                                        </select>
                                    </div>
                                    vs.
                                    <div>
                                        <select class="team ui-corner-all" id="team2MatchUp3" name="teamMatchUp3[]">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </br>
                    </form>
                </div>{{-- end .box-body --}}
					<div id="loadingOverlay"><i id="spinImage"></i></div>
					<div class="box-footer">
						<input class="btn btn-success btn-sm" type="button" id="submitForm" onclick="submitScoreForm();" value="Create" />
						<div id="errorText"></div>
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
            autoclose : true,
			todayHighlight: true
        });
		var players = [];
		var levels = [];
		var teams = [];
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
		$.getJSON("{{URL::to('/')}}/team/year/" + new Date().getFullYear(), function(data){
                teams = data;
            });

		for (i = 12; i > 0; i--) {
			$("#players").append($("<option></option>").val(i).html(i));
		}
		var groups = [1,2,3];

		$("#players")
		  .change(function () {
			$('#playersList').empty();
			if($('#matchTypeIndividual').is(':checked')) {
                for (i = 1; i <= $(this).val(); i++) {
                    $('#playersList').append('<div name="player"><label for="player">' + i + '</label><select name="player[' + i + '][player_id]" class="player ui-corner-all" id="player"></select><label for="level">Level</label><select name="player[' + i + '][level_id]" class="level ui-corner-all" id="level" ></select><label for="group">Group</label><select name="player[' + i + '][group]" class="group ui-corner-all" id="group" ></select><br />'); //add player div
                }
            }
              if(($('#matchTypeBoth').is(':checked')) || ($('#matchTypeTeam').is(':checked'))) {
                  for (i = 1; i <= $(this).val(); i++) {
                      $('#playersList').append('<div name="player"><label for="player">' + i + '</label><select name="player[' + i + '][player_id]" class="player ui-corner-all" id="player"></select><label for="level">Level</label><select name="player[' + i + '][level_id]" class="level ui-corner-all" id="level" ></select><label for="group">Group</label><select name="player[' + i + '][group]" class="group ui-corner-all" id="group" ></select><label for="team">Team</label><select name="player[' + i + '][team]" class="team ui-corner-all" id="team" ></select></div><br />'); //add player div
                  }
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
              $.each(teams, function(index, text) {
                  $(".team").append(
                      $("<option></option>").val(text.id).html(text.name)
                  );
              });

			//Determine purse and display
			var purse = 5 * $(this).val();
			$('#purse').val(purse);
		  }).change();
            });
            function submitScoreForm() {
				$("#loadingOverlay").addClass("overlay");
				$("#spinImage").addClass("fa fa-refresh fa-spin");
                $.ajax({
                    url:    "{{URL::to('/')}}/matches",
                    type:   "post",
                    data:   $("#scoreForm").serializeArray(),
					success: function(data){
						$("#loadingOverlay").removeClass("overlay");
						$("#spinImage").removeClass("fa fa-refresh fa-spin");
					},
					error: function(data){
						$("#loadingOverlay").removeClass("overlay");
						$("#spinImage").removeClass("fa fa-refresh fa-spin");
						$("#errorText").html(data.statusText);
					}
                });
            }

        $('#scoreForm input').on('change', function() {

            if($('#matchTypeBoth').is(':checked')  || $('#matchTypeTeam').is(':checked')) {
                //show team matchups div
                $('#teamMatchUps').show();
            }
            if($('#matchTypeIndividual').is(':checked')) {
                //show team matchups div
                $('#teamMatchUps').hide();
            }

        });

        </script>
@stop

@section('onload')
<script>

</script>
@stop
