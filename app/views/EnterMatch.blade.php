<!DOCTYPE html>
<html>
<style type="text/css">

</style>
    <head>
        <title>Golf League</title>
        <link rel="stylesheet" href="<?php echo asset('jquery-ui-1.10.4.custom/css/blitzer/jquery-ui-1.10.4.custom.css')?>" />
        <link rel="stylesheet" href="<?php echo asset('jquerymultiselect/jquery.multiselect.css')?>" />
		<link rel="stylesheet" href="<?php echo asset('jqGrid-4.5.4/css/ui.jqgrid.css')?>" />
    </head>
    <body>
            <h3>Four Loko League Date: {{$data[0]->date}}</h3>
			<h4>Course: {{$data[0]->course->name}}</h4>
			<h4>Par: {{$data[0]->course->par}}</h4>
            <br>
			<table id="group1Grid"></table>
			<div id="group1Pager"></div>
			<br>
			<table id="group2Grid"></table>
			<div id="group2Pager"></div>
			<br>
			<table id="group3Grid"></table>
			<div id="group3Pager"></div>

        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-1.10.2.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js')?>" type="text/javascript"></script>
		<script src="<?php echo asset('jqGrid-4.5.4/js/jquery.jqGrid.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('jquerymultiselect/jquery.multiselect.min.js')?>" type="text/javascript"></script>
        <script>
		$(document).ready(function () {
		var groupId = get('group');

		for (i = 1; i < 4; i++) {
				$("#group"+ i +"Grid").jqGrid({
					url: '{{URL::to('/')}}/matchrounds/1?group=' + i,
					datatype: "json",
					 colModel: [
						{ label: 'Player', name: 'name', width: 40, frozen: true },
						{ label: 'Hole 1', name: 'round.0.holescores.0.score', width: 20 },
						{ label: 'Hole 2', name: 'round.0.holescores.1.score', width: 20 },
						{ label: 'Hole 3', name: 'round.0.holescores.2.score', width: 20 },
						{ label: 'Hole 4', name: 'round.0.holescores.3.score', width: 20 },
						{ label: 'Hole 5', name: 'round.0.holescores.4.score', width: 20 },
						{ label: 'Hole 6', name: 'round.0.holescores.5.score', width: 20 },
						{ label: 'Hole 7', name: 'round.0.holescores.6.score', width: 20 },
						{ label: 'Hole 8', name: 'round.0.holescores.7.score', width: 20 },
						{ label: 'Hole 9', name: 'round.0.holescores.8.score', width: 20 },

					],
					viewrecords: true, // show the current page, data rang and total records on the toolbar
					width: 480,
					height: 200,
					rowNum: 30,
					loadonce: true, // this is just for the demo
					//pager: "#group"+ i +"Pager"
				});
		}
});

	function get(name){
   if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
      return decodeURIComponent(name[1]);
}
 </script>

    </body>
</html>
