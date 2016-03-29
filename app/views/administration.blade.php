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
            <div id="loadingOverlay"><i id="spinImage"></i></div>
        <button id ="playerButton" class="btn btn-success" type="button" onclick="$('#playerFormDiv').toggle();">Add Player</button>
            <div id="playerFormDiv" style="display:none;">
                <div class="box-body">
                    <form role="form" id="playerForm" >
                        <div class="form-group">
                          <label for="name">Player Name</label>
                          <input type="text" placeholder="Enter name" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="handicap">Handicap</label>
                          <input type="number" step="0.01" placeholder="Enter Handicap" id="handicap" name="handicap" class="form-control">
                        </div>
                    </form>
                    <div class="box-footer">
                        <button id="submitPlayerForm" class="btn btn-success" type="submit">Submit</button>
                        <div id="errorText"></div>
                    </div>
                </div>
            </div>
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

    $( "#submitPlayerForm" ).click(function( event ) {
        $("#loadingOverlay").addClass("overlay");
		$("#spinImage").addClass("fa fa-refresh fa-spin");
        var datastring = $("#playerForm").serialize();
        $.ajax({
            type: "POST",
            url: "{{URL::to('/')}}/players",
            data: datastring,
            success: function(data){
					$("#loadingOverlay").removeClass("overlay");
					$("#spinImage").removeClass("fa fa-refresh fa-spin");
                    $("#playerForm").trigger('reset');//clear form
                    w2ui['players'].reload();//reload grid
                    $('#playerFormDiv').toggle();//close div
				},
            error: function(data){
                $("#loadingOverlay").removeClass("overlay");
                $("#spinImage").removeClass("fa fa-refresh fa-spin");
                $("#errorText").html(data.statusText);
            }
          });
    });

</script>

@stop
