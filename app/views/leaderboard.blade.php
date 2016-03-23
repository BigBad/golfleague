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
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="form-group col-xs-2">
                        <label for="year">Year</label>
                        <select class="form-control" name="year" class="ui-corner-all" id="year">
                            <option></option>
                        </select>
                    </div>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <table id="leaderboardTable" class="display table table-bordered table-hover dataTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Money</th>
                                <th>Entry Fees</th>
                                <th>Net Money Won</th>
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
    function createLeaderboard(year){
        $('#leaderboardTable').dataTable({
            "order": [[1, "desc"]],
            "bDestroy": true,
            "bPaginate": false,
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
    }

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
                createLeaderboard(year);
            }
        })
    });

</script>
@stop

@section('onload')

@stop
