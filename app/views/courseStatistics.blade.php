@extends('template.base')

@section('title')
    Statistics
@stop

@section('first-css')

@stop

@section('page-header')
    Course Statistics
@stop

@section('breadcrumb')
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header no-padding">
                </div>{{-- end .box-header --}}
                <div class="box-body">
                    <form role="form" id="statForm">
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="course">Course</label>
                                <select class="form-control" name="course" class="ui-corner-all" id="course">
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="player">Player</label>
                                <select class="form-control" name="player" class="ui-corner-all" id="player">
                                    <option></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <label for="year">Year</label>
                                <select class="form-control" name="year" class="ui-corner-all" id="year">
                                    <option selected></option>
                                    <option value="2016">2016</option>
                                    <option value="2015">2015</option>
                                    <option value="2014">2014</option>
                                    <option value="2013">2013</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>{{-- end .box-body --}}
                <div id="loadingOverlay"><i id="spinImage"></i></div>
                <div class="box-footer">
                    <input class="btn btn-success btn-sm" type="button" id="submitForm" onclick="submitStatForm();" value="Generate Statistic" />
                    <div id="errorText"></div>
                </div>
            </div>{{-- end .box.box-primary --}}
        </div>{{-- end .col-md-5 --}}
    </div>{{-- end .row --}}

    <div class="row">
        <div class="col-md-4">
            <!-- small box -->
            <div class="small-box bg-green stats">
                <div class="inner">
                    <p>Average Score</p>
                    <h3 id="average"><sup style="font-size: 20px"></sup></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-calculator"></i>
                </div>
            </div>
        </div>

    </div>{{-- end .row --}}



@stop

@section('include-js')

@stop

@section('page-js')
    <script>
        $(document).ready(function() {
            $('.stats').hide();
            $.getJSON("{{URL::to('/')}}/courses", function(data){
                $.each(data, function(index, text) {
                    $("#course").append(
                            $("<option></option>").val(text.id).html(text.name)
                    );
                });
            });
            $.getJSON("{{URL::to('/')}}/players", function(data){
                $.each(data, function(index, text) {
                    $("#player").append(
                            $("<option></option>").val(text.id).html(text.name)
                    );
                });
            });
        });

        function submitStatForm() {
            $("#loadingOverlay").addClass("overlay");
            $("#spinImage").addClass("fa fa-refresh fa-spin");

            //create URL
            var url = "{{URL::to('/')}}";

            var course = $("#course").val();
            var player = $("#player").val();
            var year = $("#year").val();

            if(course && player && year){
                url += "/courseStatistics/course/" + course + "/player/" + player + "/year/" + year
            }
            if(course && player && !year){
                url += "/courseStatistics/course/" + course + "/player/" + player
            }
            if(course && !player && !year){
                url += "/courseStatistics/course/" + course
            }
            if(course && !player && year){
                url += "/courseStatistics/course/" + course + "/year/" + year
            }

            $.ajax({
                url:    url,
                type:   "get",
                success: function(data){
                    $("#loadingOverlay").removeClass("overlay");
                    $("#spinImage").removeClass("fa fa-refresh fa-spin");
                    $("#average").html(data);
                    $('.stats').show("slow");
                },
                error: function(data){
                    $("#loadingOverlay").removeClass("overlay");
                    $("#spinImage").removeClass("fa fa-refresh fa-spin");
                    $("#errorText").html(data.statusText);
                }
            })

        }
    </script>
@stop

@section('onload')

@stop
