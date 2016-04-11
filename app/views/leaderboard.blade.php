@extends('template.base')

@section('title')
    Leaderboard
@stop

@section('first-css')

@stop

@section('page-header')
    Leaderboard
@stop

@section('breadcrumb')
    <li><a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><a href="{{ URL::to('leaderboard') }}"><i class="fa fa-users"></i> Leaderboard</a></li>
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

        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Money Leaders</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="leaderboardTable" class="display table table-bordered table-hover DataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Player</th>
                                <th>Money</th>
                                <th>Entry Fees</th>
                                <th>Net Money Won</th>
                            </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-success --}}
        </div>{{-- end .col-md-5 --}}

        <div class="col-md-5">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Net Leaders</h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="netScoreTable" class="display table table-bordered table-hover DataTable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Player</th>
                            <th>Total</th>
                            <th>Rounds</th>
                        </tr>
                        </thead>
                    </table>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-success --}}
        </div>{{-- end .col-md-5 --}}

    </div>{{-- end .row --}}

@stop

@section('include-js')

@stop

@section('page-js')
<script>


    $(document).ready(function() {

        $.getJSON("{{URL::to('/')}}/years", function(result) {
            var options = $("#year");
            $.each(result, function(key, value) {
                options.append($("<option />").val(value).text(value));
            });
        });

        $("#year").change(function () {
            var year = $("#year").val();
            if (year != '') {
                $('#leaderboardTable').DataTable({
                    "order": [[1, "desc"]],
                    "bDestroy": true,
                    "bPaginate": true,
                    "bFilter": false,
                    "bInfo": false,
                    "ajax": "{{URL::to('/')}}/leaderboard/" + year,
                    "columns": [
                        {"data": "name"},
                        {"data": "winnings"},
                        {"data": "entryfees"},
                        {"data": "net"}
                    ]
                });
                $('#netScoreTable').DataTable({
                    "order": [[1, "asc"],[2, "desc"]],
                    "bDestroy": true,
                    "bPaginate": true,
                    "bFilter": false,
                    "bInfo": false,
                    "ajax": "{{URL::to('/')}}/leagueStatistics/netCumulativeTop/5/" + year,
                    "columns": [
                        {"data": "player"},
                        {"data": "score"},
                        {"data": "rounds"}
                    ]
                });
            }
        })
    });

</script>
@stop

@section('onload')

@stop
