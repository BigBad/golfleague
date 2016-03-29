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
        <div class="col-md-4">
            <!-- small box -->
              <div class="small-box bg-green stats">
                <div class="inner">
                <p>Current Handicap</p>
                  <h3 id="handicap"><sup style="font-size: 20px"></sup></h3>
                </div>
                <div class="icon">
                  <i class="fa fa-wheelchair"></i>
                </div>
              </div>
        </div>

        <div class="col-md-4">
            <!-- small box -->
            <!--
              <div class="small-box bg-green stats">
                <div class="inner">
                <p>Scoring Average</p>
                  <h3 id="average"><sup style="font-size: 20px"></sup></h3>
                </div>
                <div class="icon">
                  <i class="fa fa-bar-chart"></i>
                </div>
              </div> -->
        </div>

    </div>{{-- end .row --}}

    <div class="row">
        <div class="col-md-4">
            <div class="box box-success stats">
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
     $('.stats').hide();
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

            $.getJSON("{{URL::to('/')}}/players/" + $("#player").val(), function(data){
                $("#playerName").html(data.name);
                if(data.handicap < 0){
                    $("#handicap").html('+' + Math.abs(data.handicap));
                } else {
                    $("#handicap").html(data.handicap);
                }
                $('.stats').show("slow");
            });
        });
    });
    </script>
@stop

@section('onload')

@stop
