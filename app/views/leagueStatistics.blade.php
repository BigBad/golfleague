@extends('template.base')

@section('title')
    Statistics
@stop

@section('first-css')

@stop

@section('page-header')
    League Statistics
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
                                <label for="player">Year</label>
                                <select class="form-control" name="player" class="ui-corner-all" id="year">
                                    <option></option>
                                    <option value="2015">2015</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Top 5 Gross scores</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="topGrossTable" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Score</th>
                                <th>Course</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Top 5 Net Scores</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="top5NetTable" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Score</th>
                                <th>Course</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Scoring Average</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="scoringAverage" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Rounds</th>
                                <th>Average</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Most Skins Won</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="mostSkins" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Skins</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

    <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Birdie Leaders</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="mostBirdies" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Birds</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Par Leaders</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="mostPars" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Pars</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

        <div class="row">
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Bogeys</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="bogeys" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Bogeys</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Double Bogeys</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="doubles" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Double Bogeys</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

@stop

@section('include-js')

@stop

@section('page-js')
<script>
    $(document).ready(function() {
        $("#year").change(function (){
            var year = $("#year").val();

            $('#mostSkins').dataTable( {
                "order": [[ 1, "desc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/skins/" + year,
                "columns": [
                    { "data": "name" },
                    { "data": "skins" }
                ]
            });

            $('#topGrossTable').dataTable( {
                "order": [[ 1, "asc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/gross/" + year,
                "columns": [
                    { "data": "player.name" },
                    { "data": "score" },
                    { "data": "course.name" },
                ]
            });

            $('#scoringAverage').dataTable( {
                "order": [[ 2, "asc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/scoringaverage/" + year,
                "columns": [
                    { "data": "name" },
                    { "data": "rounds" },
                    { "data": "average" },
                ]
            });

            $('#top5NetTable').dataTable( {
                "order": [[ 1, "asc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/net/" + year,
                "columns": [
                    { "data": "player.name" },
                    { "data": "score" },
                    { "data": "match.course.name" },
                ]
            });

			$('#mostBirdies').dataTable( {
                "order": [[ 1, "desc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/bird/" + year,
                "columns": [
                    { "data": "name" },
                    { "data": "birds" }
                ]
            });

			$('#mostPars').dataTable( {
                "order": [[ 1, "desc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/par/" + year,
                "columns": [
                    { "data": "name" },
                    { "data": "pars" }
                ]
            });

            $('#bogeys').dataTable( {
                "order": [[ 1, "desc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/bogey/" + year,
                "columns": [
                    { "data": "name" },
                    { "data": "bogeys" }
                ]
            });

			$('#doubles').dataTable( {
                "order": [[ 1, "desc" ]],
                "bPaginate": false,
                "bFilter": false,
                "bInfo": false,
                "scrollY":        "205px",
                "scrollX": false,
                "scrollCollapse": true,
                "paging":         false,
                "ajax": "{{URL::to('/')}}/double/" + year,
                "columns": [
                    { "data": "name" },
                    { "data": "doubles" }
                ]
            });

        });
    });

</script>
@stop

@section('onload')

@stop
