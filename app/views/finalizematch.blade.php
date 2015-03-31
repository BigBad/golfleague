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
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="ctp1">Closest To Pin #1</label>
                                <select class="form-control" name="ctp1" class="ui-corner-all" id="ctp1">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-xs-3">
                                <label for="ctp1hole">Hole</label>
                                <select class="form-control" name="ctp1hole" class="ui-corner-all" id="ctp1hole">
                                    <option></option>
                                </select>
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
                                <label for="ctp2hole">Hole</label>
                                <select class="form-control" name="ctp2hole" class="ui-corner-all" id="ctp2hole">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>{{-- end .box-body --}}
                <div class="box-footer">
						<input class="btn btn-success btn-sm" type="button" id="submitForm" onclick="submitMatchForm();" value="Submit" />
				</div>
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

    <div class="row">
    <div class="col-md-5">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Match Results</h3>

            </div><!-- /.box-header -->
            <div class="box-body" id ="results" style="visibility: hidden;">

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Gross Winner</span>
                        <span class="info-box-number">Player Name</span>

                        <span class="progress-description">
                        $ amount
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-wheelchair"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Net Winner</span>
                        <span class="info-box-number">Player Name</span>

                        <span class="progress-description">
                        $ amount
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-money">A</i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Skins A</span>
                        <span class="info-box-number">Player Name</span>

                        <span class="progress-description">
                        $ amount
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-money">B</i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Skins B</span>
                        <span class="info-box-number">Player Name</span>

                        <span class="progress-description">
                        $ amount
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

            </div><!-- /.box-body -->
        </div><!-- /.box -->
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
            $.getJSON("{{URL::to('/')}}/matches/" + $("#match").val(), function(data){
                $.each(data.players, function(index, data) {
                    $("#ctp1, #ctp2").append(
                        $("<option></option>").val(data.id).html(data.name)
                        );
                });

             });
        });

        function submitMatchForm() {
            $.ajax({
                url:    "{{URL::to('/finalize')}}/",
                type:   "post",
                data:   $("#matchForm").serializeArray()
            })
                .done(function(data){
                    $('#results').css('visibility','visible').hide().fadeIn('slow');
                });
        }
        </script>
@stop

@section('onload')
<script>

</script>
@stop
