@extends('template.base')

@section('title')
    Administration
@stop

@section('first-css')
<link href="<?php echo asset('LTE/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />
@stop

@section('page-header')
    Finalize Match
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
                                <label for="course">Course</label>
                                <input class="form-control" name="course" class="ui-corner-all" id="course" disabled>
                                </input>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="ctp1">Closest To Pin #1</label>
                                <select class="form-control" name="ctp1" class="ui-corner-all" id="ctp1">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="ctp1hole">Hole #</label>
                                <input class="form-control" name="ctp1holeText" class="ui-corner-all" id="ctp1holeText" disabled/>
                                <input class="form-control" name="ctp1hole" class="ui-corner-all" id="ctp1hole" type="hidden"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="ctp2">Closest To Pin #1</label>
                                <select class="form-control" name="ctp2" class="ui-corner-all" id="ctp2">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="ctp2hole">Hole #</label>
                                <input class="form-control" name="ctp2holeText" class="ui-corner-all" id="ctp2holeText" disabled/>
                                <input class="form-control" name="ctp2hole" class="ui-corner-all" id="ctp2hole" type="hidden"/>
                            </div>
                        </div>
                    </form>
                </div>{{-- end .box-body --}}
				<div id="loadingOverlay"><i id="spinImage"></i></div>
                <div class="box-footer">
						<input class="btn btn-success btn-sm" type="button" id="submitForm" onclick="submitMatchForm();" value="Submit" />
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

		$(document).ready(function() {
            $.getJSON("{{URL::to('/')}}/matches", function(data){
                $.each(data, function(index, data) {
                $("#match").append(
                    $("<option></option>").val(data.id).html(data.date)
                    );
                });
            });
        });

        $("#match").change(function () {
			$("#ctp1, #ctp2").empty();
            $.getJSON("{{URL::to('/')}}/matches/" + $("#match").val(), function(data){
                $.each(data.players, function(index, data) {
                    $("#ctp1, #ctp2").append(
                        $("<option></option>").val(data.id).html(data.name)
                        );
                });
				$("#course").val(data.course.name);
				var i = 1;
				$.each(data.course.holes, function(index, data) {
					if (data.par === 3){
						$("#ctp" + i +"hole").val(data.id);
						$("#ctp" + i +"holeText").val(data.number);
						i++;
					}
                });
             });
        });

        function submitMatchForm() {
			$("#loadingOverlay").addClass("overlay");
			$("#spinImage").addClass("fa fa-refresh fa-spin");
            $.ajax({
                url:    "{{URL::to('/finalize')}}/",
                type:   "post",
                data:   $("#matchForm").serializeArray(),
				success: function(data){
						$("#loadingOverlay").removeClass("overlay");
						$("#spinImage").removeClass("fa fa-refresh fa-spin");
					}
            })
        }
        </script>
@stop

@section('onload')
<script>

</script>
@stop
