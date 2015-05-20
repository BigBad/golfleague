@extends('template.base')

@section('title')
    Statistics
@stop

@section('first-css')

@stop

@section('page-header')
    Individual Statistics
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
                                <label for="year">Year</label>
                                <select class="form-control" name="year" class="ui-corner-all" id="year">
                                    <option value='2015' selected>2015</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="player">Player</label>
                                <select class="form-control" name="player" class="ui-corner-all" id="player">
                                    <option></option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">All Scores</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="allScores" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Score</th>
                                <th>Course</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
        <div class="col-md-5">

        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

@stop

@section('include-js')

@stop

@section('page-js')
    <script>
    $(document).ready(function() {
        $.getJSON("{{URL::to('/')}}/players", function(data){
                $.each(data, function(index, text) {
                    $("#player").append(
                        $("<option></option>").val(text.id).html(text.name)
                    );
                });
        });
        var allScoresTable = $('#allScores').DataTable( {
                "order": [[ 3, "desc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "",
                "columns": [
                    { "data": "player.name" },
                    { "data": "score" },
                    { "data": "course.name" },
                    { "data": "date"}
                ]
            });

        $("#player").change(function (){
            var url = "{{URL::to('/')}}/rounds/" + $("#player").val();
            allScoresTable.ajax.url(url).load();
        });
    });
    </script>
@stop

@section('onload')

@stop
