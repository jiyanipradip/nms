<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 3; URL=$url1");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>NMS</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/plugins/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="js/plugins/spinner/jquery.mousewheel.js"></script>

<script type="text/javascript" src="js/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/plugins/charts/excanvas.min.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.orderBars.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/plugins/charts/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="js/plugins/forms/uniform.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.cleditor.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/chosen.jquery.min.js"></script>

<script type="text/javascript" src="js/plugins/wizard/jquery.form.js"></script>
<script type="text/javascript" src="js/plugins/wizard/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/plugins/wizard/jquery.form.wizard.js"></script>

<script type="text/javascript" src="js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="js/plugins/uploader/jquery.plupload.queue.js"></script>

<script type="text/javascript" src="js/plugins/tables/datatable.js"></script>
<script type="text/javascript" src="js/plugins/tables/tablesort.min.js"></script>
<script type="text/javascript" src="js/plugins/tables/resizable.min.js"></script>

<script type="text/javascript" src="js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.sourcerer.js"></script>

<script type="text/javascript" src="js/plugins/calendar.min.js"></script>
<script type="text/javascript" src="js/plugins/elfinder.min.js"></script>

<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript" src="js/charts/chart.js"></script>

<!-- Shared on MafiaShare.net --><!-- Shared on MafiaShare.net -->
</head>

<body>

<!-- Left side content -->
<?php require_once("adminleft.php");?>

<!-- Right side -->
<div id="rightSide">
<!-- Top fixed navigation -->
<?php require_once("admintop.php");?>

<!-- Title area -->
<div class="titleArea">
<div class="wrapper">
<div class="pageTitle">
<h5>DASHBOARD</h5>
</div>
<div class="clear"></div>
</div>
</div>
<div class="line"></div>

<!-- Main content wrapper -->
<div class="wrapper">
<?php if($msg!=''){?>
<!-- Notifications -->
<div class="nNote nWarning hideit">
<p><strong><?php echo $msg;?></strong></p>
</div>
<?php } ?>
<!-- Form -->
<form id="validate" class="form" method="post" action="">
<fieldset>

<div class="wrapper">
<!-- Dynamic table -->
<div class="widget">
<div class="title"><img src="images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>List Of Treatment Patient</h6></div>   
<table cellpadding="0" cellspacing="0" border="0" class="display dTable">
<thead>
<tr>
<th>Code</th>
<th>Code Type</th>
<th>Name</th>
<th>Total Patient</th>
<th>Check Up</th>
<th>Remaining</th>
</tr>
</thead>
<tbody>
<?php
$sql_list="select p1.code as inccode, p1.id as iid , p2.id as gid ,p1.name as name,p2.name as codetype from incomingsourcemaster p1,paramtype p2 where p1.codetype=p2.id order by p1.id";
//echo $sql_list."<br>";
$sql_list_query=mysql_query($sql_list)or die(mysql_error());
while($row_list=mysql_fetch_assoc($sql_list_query))
{
	$sqlpat = "SELECT COUNT(*) as totalpat FROM patientmaster WHERE incomingid ='$row_list[iid]'";
	//echo $sqlpat."<br>";
	$rspat = mysql_query($sqlpat);
	$datapat = mysql_fetch_assoc($rspat);
	$sqlcheckup = "SELECT COUNT(*) as ckppat FROM checkup c1, patientmaster p1 WHERE c1.pid=p1.pid and p1.incomingid='$row_list[iid]'";
	//echo $sqlcheckup."<br>";
	$rscheckup = mysql_query($sqlcheckup);
	$datacheckup = mysql_fetch_assoc($rscheckup);
	
	$totalpat = $datapat['totalpat'];
	$ckppat = $datacheckup['ckppat'];
	$remainingpat = $totalpat - $ckppat;
	
?>
<tr class="gradeA">
<td><?php echo $row_list['inccode']; ?></td>
<td><?php echo $row_list['codetype']; ?></td>
<td><?php echo $row_list['name']; ?></td>
<td><?php echo $totalpat; ?></td>
<td><?php echo $ckppat; ?></td>
<td><?php echo $remainingpat; ?></td>
</tr>
<?
}
?>
</tbody>
</table>
</div>

</div>
</fieldset>
</form>
</div>

<br>
<div class="line"></div>
</div>

<div class="clear"></div>

</body>
</html>
