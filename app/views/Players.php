<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('jquery-ui-1.10.4.custom/css/blitzer/jquery-ui-1.10.4.custom.css')?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo asset('jquery.jqGrid-4.5.4/css/ui.jqgrid.css')?>" />

<script src="<?php echo asset('jquery.jqGrid-4.5.4/js/jquery-1.9.0.min.js')?>" type="text/javascript"></script>
<script src="<?php echo asset('jquery.jqGrid-4.5.4/js/i18n/grid.locale-en.js')?>" type="text/javascript"></script>
<script src="<?php echo asset('jquery.jqGrid-4.5.4/js/jquery.jqGrid.min.js')?>" type="text/javascript"></script>

<script type="text/javascript">
$(function () {
    $("#players").jqGrid({
        url: "players/getPlayers",
        datatype: "json",
        mtype: "GET",
        colNames: ["Name", "Handicap"],
        colModel: [
            { name: "name", width: 150, editable:true },
            { name: "handicap", width: 100 }
        ],
        pager: "#playersPager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "name",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
        caption: "Players",
		editurl:"players/edit"
    }); 
});
$("#players").jqGrid("navGrid", "#playersPager",{edit:true,add:true,del:true,refresh:false});
</script>
 
</head>
<body>
    <table id="players"><tr><td></td></tr></table> 
    <div id="playersPager"></div> 
</body>
</html>



