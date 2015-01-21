<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('jquery-ui-1.10.4.custom/css/blitzer/jquery-ui-1.10.4.custom.css')?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('jquery.jqGrid-4.5.4/css/ui.jqgrid.css')?>" />
</head>
<body>
    <table id="players"></table>
    <div id="playersPager"></div>
	<br><br>
	<table id="courses"></table>
    <div id="coursesPager"></div>
	<br><br>
	<table id="scores"></table>
    <div id="scoresPager"></div>
	
<script src="<?php echo asset('jquery.jqGrid-4.5.4/js/jquery-1.9.0.min.js')?>" type="text/javascript"></script>
<script src="<?php echo asset('jquery.jqGrid-4.5.4/js/i18n/grid.locale-en.js')?>" type="text/javascript"></script>
<script src="<?php echo asset('jquery.jqGrid-4.5.4/js/jquery.jqGrid.min.js')?>" type="text/javascript"></script>

<script type="text/javascript">
//jqGrid code for the Players section
$(function () {
    $("#players").jqGrid({
        url: "players/getPlayers",
        datatype: "json",
        mtype: "GET",
        colNames: ["Name", "Handicap"],
        colModel: [
            { name: "name", width: 375, editable:true },
            { name: "handicap", width: 100 }
        ],
        pager: "#playersPager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "name",
        sortorder: "desc",
        viewrecords: true,
		loadonce: true,
        gridview: true,
        autoencode: true,
        caption: "Players",
        editurl:"players/edit"
    });
    $("#players").jqGrid("navGrid", "#playersPager",{edit:true,add:true,del:true,refresh:false},
        {
        closeAfterEdit:true,
        recreateForm: true,
        editCaption: "Edit Player",
        errorTextFormat:function(data){
            return data.statusText;
        },
            reloadAfterSubmit:true
        },
        {
            closeAfterAdd:true,
            recreateForm: true,
            addCaption: "Add Player",
            errorTextFormat:function(data){
                return data.statusText;
            },
            reloadAfterSubmit:true,
            }
    );
});

//jqGrid code for the Courses section
$(function () {
    $("#courses").jqGrid({
        url: "courses/getCourses",
        datatype: "json",
        mtype: "GET",
        colNames: ["Name", "Par", "Rating", "Slope"],
        colModel: [
            { name: "name", width: 175, editable:true },
			{ name: "par", width: 100, editable:true },
            { name: "rating", width: 100, editable:true },
			{ name: "slope", width: 100, editable:true },		
        ],
        pager: "#coursesPager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "name",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        caption: "Courses",
        editurl:"courses/edit"
    });
    $("#courses").jqGrid("navGrid", "#coursesPager",{edit:true,add:true,del:true,refresh:false},
        {
        closeAfterEdit:true,
        recreateForm: true,
        editCaption: "Edit Course",
        errorTextFormat:function(data){
            return data.statusText;
        },
            reloadAfterSubmit:true
        },
        {
            closeAfterAdd:true,
            recreateForm: true,
            addCaption: "Add Course",
            errorTextFormat:function(data){
                return data.statusText;
            },
            reloadAfterSubmit:true,
            }
    );
});

//jqGrid code for the Scores section
$(function () {
    $("#scores").jqGrid({
        url: "scores/getScores",
        datatype: "json",
        mtype: "GET",
        colNames: ["Player", "Date", "Course", "Total", 
					"Hole 1", "Hole 2", "Hole 3", "Hole 4", 
					"Hole 5", "Hole 6", "Hole 7", "Hole 8", "Hole 9"
				],
        colModel: [
            { name: "Player", width: 100, editable:true },
            { name: "Date", width: 75, editable:true },
			{ name: "Course", width: 75, editable:true },
			{ name: "Total", width: 50, editable:true },
			{ name: "hole_1", width: 50, editable:true },
			{ name: "hole_2", width: 50, editable:true },
			{ name: "hole_3", width: 50, editable:true },
			{ name: "hole_4", width: 50, editable:true },
			{ name: "hole_5", width: 50, editable:true },
			{ name: "hole_6", width: 50, editable:true },
			{ name: "hole_7", width: 50, editable:true },
			{ name: "hole_8", width: 50, editable:true },
			{ name: "hole_9", width: 50, editable:true }			
        ],
        pager: "#scoresPager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "name",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        caption: "Scores",
    });
    $("#matches").jqGrid("navGrid", "#scoresPager",{edit:false,add:false,del:false,refresh:false},
        {
        closeAfterEdit:true,
        recreateForm: true,
        editCaption: "Edit Score",
        errorTextFormat:function(data){
            return data.statusText;
        },
            reloadAfterSubmit:true
        },
        {
            closeAfterAdd:true,
            recreateForm: true,
            addCaption: "Add Match",
            errorTextFormat:function(data){
                return data.statusText;
            },
            reloadAfterSubmit:true,
            }
    );
});



</script>	
</body>
</html>



