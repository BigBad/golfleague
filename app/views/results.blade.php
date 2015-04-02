@extends('template.base')

@section('title')
    Results
@stop

@section('first-css')
<link href="<?php echo asset('LTE/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />
@stop

@section('page-header')
    Results
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
                                <label for="match">Match Date</label>
                                <select class="form-control" name="match" class="ui-corner-all" id="match">
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
            <div class="box-header with-border">
                <h3 class="box-title" id="matchResults">Match Results</h3>

            </div><!-- /.box-header -->
            <div class="box-body" id ="results" >

				<div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-trophy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Match Money List</span>
						<div id="moneyLeaders"></div>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

				<div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CLosest To Pin</span>
							<div class="col-xs">
							<span class="info-box-number" id="CTP1"></span>
							<span class="progress-description" id="CTP1Money">
							</div>
							<div class="col-xs">
							<span class="info-box-number" id="CTP2"></span>
							<span class="progress-description" id="CTP2Money">
							</div>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Gross Winner</span>
                        <span class="info-box-number" id="grossPlayer"></span>
                        <span class="progress-description" id="grossMoney"></span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-wheelchair"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Net Winner</span>
                        <span class="info-box-number" id="netPlayer"></span>

                        <span class="progress-description" id="netMoney">
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-money">A</i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Skins A</span>
						<div id="skinsA"></div>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="fa fa-money">B</i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Skins B</span>
						<div id="skinsB"></div>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}





@stop

@section('include-js')

@stop

@section('page-js')

        <script src="<?php echo asset('LTE/plugins/datepicker/bootstrap-datepicker.js')?>" type="text/javascript"></script>
        <script>
        $("#date").datepicker({
            autoclose : true,
			todayHighlight: true
        });

		$(document).ready(function() {
            $.getJSON("{{URL::to('/')}}/matches", function(data){
                $.each(data, function(index, data) {
                $("#match").append(
                    $("<option></option>").val(data.id).html(data.date)
                    );
                });
            });
        });

        $("#match").change(function () {
            $.getJSON("{{URL::to('/')}}/money/" + $("#match").val(), function(data){
				if (jQuery.isEmptyObject(data.ctps) === false) {
					$("#skinsA, #skinsB").empty();
					$("#grossPlayer").html(data.grosswinner[0].player.name + ' - ' +data.grosswinner[0].score);
					$("#grossMoney").html('$' + data.grosswinner[0].money);
					$("#netPlayer").html(data.netwinner[0].player.name + ' - ' +data.netwinner[0].score);
					$("#netMoney").html('$' + data.netwinner[0].money);
					$("#CTP1").html(data.ctps[0].player.name);
					$("#CTP1Money").html('$' + data.ctps[0].money);
					$("#CTP2").html(data.ctps[1].player.name);
					$("#CTP2Money").html('$' + data.ctps[0].money);
					$.each(data.skins, function(index, data) {
						if(data.level_id == "1"){
							$("#skinsA").append('<span class="info-box-number">'+ data.player.name+' - Hole: ' + data.hole.number +'</span>$'+ data.money+'<span class="progress-description"></span>');
						}
						else {
							$("#skinsB").append('<span class="info-box-number">'+ data.player.name+' - Hole: ' + data.hole.number +'</span>$'+ data.money+'<span class="progress-description"></span>');
						}
					});
					$.each(data.moneylist[0].players, function(index, data) {
						if (data.pivot.winnings != "0.00") {
							$("#moneyLeaders").append('<span class="info-box-number">'+ data.name+'</span>$'+ data.pivot.winnings+'<span class="progress-description"></span>');
						}
					});
				}
             });
        });
        </script>
@stop

@section('onload')
<script>

</script>
@stop
