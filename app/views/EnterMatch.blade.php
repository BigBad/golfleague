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
            <h3>Four Loko League Week 1</h3>
			<h4>Course: </h4>
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
					url: 'data.json',
					datatype: "json",
					 colModel: [
						{ label: 'Player', name: 'player_id', width: 40, frozen: true },
						{ label: 'Hole 1', name: 'Hole1', width: 20 },
						{ label: 'Hole 2', name: 'Hole2', width: 20 },
						{ label: 'Hole 3', name: 'Hole3', width: 20 },
						{ label: 'Hole 4', name: 'Hole4', width: 20 },
						{ label: 'Hole 5', name: 'Hole5', width: 20 },
						{ label: 'Hole 6', name: 'Hole6', width: 20 },
						{ label: 'Hole 7', name: 'Hole7', width: 20 },
						{ label: 'Hole 8', name: 'Hole8', width: 20 },
						{ label: 'Hole 9', name: 'Hole9', width: 20 },
									  
					],
					viewrecords: true, // show the current page, data rang and total records on the toolbar
					width: 480,
					height: 200,
					rowNum: 30,
					loadonce: true, // this is just for the demo
					pager: "#group"+ i +"Pager"
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