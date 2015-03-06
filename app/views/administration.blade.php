@extends('template.base')

@section('title')
    Administration
@stop

@section('first-css')
    <link rel="stylesheet" href="<?php echo asset('LTE/plugins/w2ui/w2ui-1.4.2.min.css')?>" />
@stop

@section('page-header')
    Administration
@stop

@section('breadcrumb')
    <li><a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><a href="{{ URL::to('administration') }}"><i class="fa fa-users"></i> Administration</a></li>
@stop

@section('content')
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Players</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="players" style="height:400px"></div>
            </div><!-- /.box-body -->
            <button class="btn btn-success btn-sm" type="button" onclick="addARecord('players');">Add Player</button>
        </div><!-- /.box -->
    </div>
    <div class="col-md-7">
        <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Courses</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="courses" style="height:400px"></div>
            </div><!-- /.box-body -->
            <button class="btn btn-success btn-sm" type="button" onclick="addARecord('courses');">Add Course</button>
            </div>
        </div><!-- /.box -->
    </div>

@stop

@section('include-js')

@stop

@section('page-js')
    <script src="<?php echo asset('LTE/plugins/w2ui/w2ui-1.4.2.min.js')?>" type="text/javascript"></script>
@stop

@section('onload')
<script>
    $('#players').w2grid({
    name    : 'players',
    method  : 'GET',
    url     : '{{URL::to('/')}}/players',
    recid   : 'id',
    columns : [
        { field: 'name', caption: 'Name', size: '30%', editable: { type: 'text' } },
        { field: 'handicap', caption: 'Handicap', size: '30%', editable: { type: 'float' } }
    ],
    parser: function(responseText) {
        var records = $.parseJSON(responseText);
        var total = records.length;
        return {
            'total' : total,
            'records' : records
        }
    }
});

$('#courses').w2grid({
    name    : 'courses',
    method  : 'GET',
    url  : {
        get    : '{{URL::to('/')}}/courses',
        save   : 'server/side/path/to/save'
    },
    recid   : 'id',
    columns : [
        { field: 'name', caption: 'Name', size: '30%', editable: { type: 'text' } },
        { field: 'rating', caption: 'Rating', size: '30%', editable: { type: 'float' } },
        { field: 'slope', caption: 'Slope', size: '30%', editable: { type: 'float' } },
        { field: 'par', caption: 'Par', size: '30%', editable: { type: 'float' } }
    ],
    parser: function(responseText) {
        var records = $.parseJSON(responseText);
        var total = records.length;
        return {
            'total' : total,
            'records' : records
        }
    }
});

function addARecord(grid) {
    var g = w2ui[grid].records.length;

    var columns = {'recid' : g+1};
    for (i=0; i < w2ui[grid].columns.length; i++) {
        columns[w2ui[grid].columns[i].field] = '';
    }
    w2ui[grid].add(columns);

    w2ui[grid].editField(g+1,0);
}
</script>

@stop
