@extends('template.base')

@section('title')
    Schedule
@stop

@section('first-css')
<link href="<?php echo asset('LTE/plugins/fullcalendar/fullcalendar.css')?>" rel="stylesheet" type="text/css" />
@stop

@section('page-header')
    Schedule
@stop

@section('breadcrumb')
    <li><a href="{{ URL::to('') }}"><i class="fa fa-home"></i> Home</a></li>
    <li class="active"><a href="{{ URL::to('schedule') }}"><i class="fa fa-users"></i> Schedule</a></li>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header no-padding">

                </div>{{-- end .box-header --}}
                <div class="box-body no-padding">
                    <div id='calendar'></div>
                </div>{{-- end .box-body --}}
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

@stop

@section('include-js')

@stop

@section('page-js')

<script src=<?php echo asset('LTE/plugins/fullcalendar/moment.js') ?> ></script>
<script src=<?php echo asset('LTE/plugins/fullcalendar/fullcalendar.js') ?> ></script>
@stop

@section('onload')
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            events: '{{URL::to('/')}}/calendar',
            cache: true,
            eventClick: function(calEvent, jsEvent, view) {
            alert(calEvent.id);

            }
        })
    });
</script>
@stop
