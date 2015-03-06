@extends('template.base')

@section('title')
    League Match: {{$date}}
@stop

@section('first-css')
    <link rel="stylesheet" href="<?php echo asset('jqGrid-4.5.4/css/ui.jqgrid.css')?>" />
@stop

@section('page-header')


@stop

@section('breadcrumb')

@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header no-padding">
                </div>{{-- end .box-header --}}

                <div class="box box-success collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Course Info</h3>
                        <div class="box-tools pull-right">
                            <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        <table id="courseInfo" class="display" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Hole </th>
                                <th>Yards</th>
                                <th>Handicap</th>
                            </tr>
                            </thead>
                        </table>
                    </div><!-- /.box-body -->
                </div>

                <div class="box-body no-padding">
                    <table id="group1Grid"></table>
                    <div id="group1Pager"></div>
                    <br>
                    <table id="group2Grid"></table>
                    <div id="group2Pager"></div>
                    <br>
                    <table id="group3Grid"></table>
                    <div id="group3Pager"></div>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

@stop

@section('include-js')

@stop

@section('page-js')

    <script src="<?php echo asset('jqGrid-4.5.4/js/i18n/grid.locale-en.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('jqGrid-4.5.4/js/jquery.jqGrid.min.js')?>" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            var groupId = get('group');

            for (i = 1; i < 4; i++) {
                $("#group"+ i +"Grid").jqGrid({
                    url: '{{URL::to('/')}}/matchrounds/'+{{$id}} +'?group=' + i,
                    datatype: "json",
                    colModel: [
                        { label: 'Player', name: 'name', width: 67, frozen: true },
                        { label: 'Hole 1', name: 'round.0.holescores.0.score', width: 37, sorttype:"int", editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 2', name: 'round.0.holescores.1.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 3', name: 'round.0.holescores.2.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 4', name: 'round.0.holescores.3.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 5', name: 'round.0.holescores.4.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 6', name: 'round.0.holescores.5.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 7', name: 'round.0.holescores.6.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 8', name: 'round.0.holescores.7.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        },
                        { label: 'Hole 9', name: 'round.0.holescores.8.score', width: 37, editable: true,
                            edittype: 'select',
                            formatter: 'select',
                            editoptions : {value: ":;1:1;2:2;3:3;4:4;5:5;6:6;7:7;8:8;9:9;10:10;1:;1:11;12:12;13:13;14:14;15:15"}
                        }

                    ],
                    editurl: '{{URL::to('/')}}/',
                    viewrecords: true,
                    width: 450,
                    height: 100,

                    loadComplete: function () {
                        var $this = $(this), ids = $this.jqGrid('getDataIDs'), j, l = ids.length;
                        for (j = 0; j < l; j++) {
                            $this.jqGrid('editRow', ids[j], true);
                        }
                    },
                    pgtext: null,
                    viewrecords: false,
                    pager: "#group"+ i +"Pager"
                });
                $("#group"+ i +"Grid").jqGrid('navGrid', "#group"+ i +"Pager",
                        {
                            edit: false,
                            add: false,
                            del: false,
                            search: false,
                            refresh: false
                        }
                );
                $("#group"+ i +"Grid").jqGrid('inlineNav', "#group"+ i +"Pager",
                        {
                            edit: true,
                            editicon: "ui-icon-pencil",
                            add: false,
                            save: true,
                            saveicon: "ui-icon-disk",
                            search: false,
                            cancel: false,
                        }
                );
            }
        });

        function get(name){
            if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
                return decodeURIComponent(name[1]);
        }
    </script>
@stop

@section('onload')
    <script>
    $('#example').dataTable( {
    "ajax": "data/objects.txt",
    "columns": [
    { "data": "name" },
    { "data": "position" },
    { "data": "office" },
    { "data": "extn" },
    { "data": "start_date" },
    { "data": "salary" }
    ]
    } );
    </script>
    @stop







