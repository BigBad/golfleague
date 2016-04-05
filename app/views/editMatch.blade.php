@extends('template.base')

@section('title')
    Administration
@stop

@section('first-css')
    <link href="<?php echo asset('LTE/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />
@stop

@section('page-header')
    Edit Match
@stop

@section('breadcrumb')

@stop

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header no-padding">
                </div>{{-- end .box-header --}}
                <div class="box-body">
                    <form role="form" id="matchForm">
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="match">Match Date</label>
                                <select class="form-control" name="match" class="ui-corner-all" id="match">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-xs-6">
                                <div class="form-group">
                                    <label for="course">Course:</label>
                                    <select class="form-control" name="course" class="ui-corner-all" id="course">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <div name="playersList" id="playersList"></div>
                            </div>
                        </div>

                    </form>
                </div>{{-- end .box-body --}}
                <div id="loadingOverlay"><i id="spinImage"></i></div>
                <div class="box-footer">
                    <input class="btn btn-success btn-sm" type="button" id="submitForm" onclick="submitMatchForm();" value="Submit" />
                    <div id="errorText"></div>
                </div>

            </div>
        </div>{{-- end .box.box-primary --}}
    </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}
@stop

@section('include-js')

@stop

@section('page-js')

    <script>
        var players = [];
        var levels =[];
        var groups = [1,2,3];
        $(document).ready(function() {
            $.getJSON("{{URL::to('/')}}/matchEdit", function(data){
                $.each(data, function(index, data) {
                    $("#match").append(
                            $("<option></option>").val(data.id).html(data.date)
                    );
                });
            });
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

        });

        $("#match").change(function () {
            $.getJSON("{{URL::to('/')}}/matchEdit/" + $("#match").val(), function(data){
                $('#playersList').empty();
                // select course
                $("#course").val(data.course_id);

                //$('#playersList').empty();
                for (i = 1;  i <= data.players_edit.length; i++) {
                    $('#playersList').append('<div name="player"><label for="player">'+i+ '</label><select name="player['+i+'][player_id]" class="player ui-corner-all" id="player'+i+'"></select><label for="level">Level</label><select name="player['+i+'][level_id]" class="level ui-corner-all" id="level'+i+'" ></select><label for="group">Group</label><select name="player['+i+'][group]" class="group ui-corner-all" id="group'+i+'" ></select></div><br />'); //add player div
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
                //Select proper value in drop downs
                var i = 1;
                $.each(data.players_edit, function(index, text) {
                    $("#player"+i).val(text.id);
                    $("#level"+i).val(text.pivot.level_id);
                    $("#group"+i).val(text.pivot.group);
                    i++;
                });


            });
        });

        function submitMatchForm() {
            $("#loadingOverlay").addClass("overlay");
            $("#spinImage").addClass("fa fa-refresh fa-spin");
            $.ajax({
                url:    "{{URL::to('/')}}/matchEdit/"+ $("#match").val(),
                type:   "put",
                data:   $("#matchForm").serializeArray(),
                success: function(data){
                    $("#loadingOverlay").removeClass("overlay");
                    $("#spinImage").removeClass("fa fa-refresh fa-spin");
                },
                error: function(data){
                    $("#loadingOverlay").removeClass("overlay");
                    $("#spinImage").removeClass("fa fa-refresh fa-spin");
                    $("#errorText").html(data.statusText);
                }
            })
        }
    </script>
@stop

@section('onload')
    <script>

    </script>
@stop
