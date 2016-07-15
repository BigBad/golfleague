@extends('template.base')

@section('title')
    Administration
@stop

@section('first-css')
    <link href="<?php echo asset('LTE/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />
@stop

@section('page-header')
    Create Tournament
@stop

@section('breadcrumb')
    <li><a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><a href="{{ URL::to('tournament/create') }}"><i class="fa fa-users"></i> Create Tournament</a></li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header no-padding">
                </div>{{-- end .box-header --}}
                <div class="box-body">
                    <form role="form" id="TournamentForm">
                        <div class="form-group" >
                            <label for="format">Name of Tournament:</label>
                            <input class="form-control" type="text" name="name" class="ui-corner-all" id="name" >

                        </div>
                        <div class="form-group" >
                            <label for="weeks">Number of weeks:</label>
                            <select class="form-control" type="number" name="number_of_weeks" class="ui-corner-all" id="weeks" >
                                <option></option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        <div class="form-group datesGroup">

                        </div>
                        <div class="form-group" >
                            <label for="format">Format of Tournament:</label>
                            <select class="form-control" type="text" name="format" class="ui-corner-all" id="format" >
                                <option>Net</option>
                                <option>Gross</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div id="pursediv">
                                <label for="purse">Purse:</label>
                                <input class="form-control" type="number" name="purse" class="ui-corner-all" id="purse"  />
                            </div>
                        </div>
                        </br>
                    </form>
                </div>{{-- end .box-body --}}
                <div id="loadingOverlay"><i id="spinImage"></i></div>
                <div class="box-footer">
                    <input class="btn btn-success btn-sm" type="button" id="submitForm" onclick="submitTournamentForm();" value="Create" />
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
        $(document).ready(function() {
            $("#weeks").change(function () {
                $('.datesGroup').empty();
                for (i = 1; i <= $(this).val(); i++) {
                    $('.datesGroup').append('<label for="date">Date '+i+':</label><input class="form-control dates" type="date" name="dates[]" id="dates"></>');
                }
                $(".dates").datepicker({
                    autoclose : true,
                    todayHighlight: true
                });
        })
        });

        function submitTournamentForm() {
            $("#loadingOverlay").addClass("overlay");
            $("#spinImage").addClass("fa fa-refresh fa-spin");
            $.ajax({
                url:    "{{URL::to('/')}}/tournament",
                type:   "post",
                data:   $("#TournamentForm").serializeArray(),
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
    </script>
@stop

@section('onload')
    <script>

    </script>
@stop
