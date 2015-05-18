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
                                <label for="player">Year</label>
                                <select class="form-control" name="player" class="ui-corner-all" id="player">
                                    <option></option>
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

@stop

@section('include-js')

@stop

@section('page-js')

@stop

@section('onload')

@stop
