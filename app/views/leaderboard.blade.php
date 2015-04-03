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
            <div class="box">
                <div class="box-header no-padding">
                    <h3 class="box-title"></h3>
                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <div id="statistics-table" style="height: 681px;"></div>
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
