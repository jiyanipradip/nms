<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
?>

<script language="javascript">
function deletedoctor(docid)
{	
	if (confirm('Are You Sure You Want To Delete?')) {
		window.location.href = 'functions.php?action=deletedoctor&docid='+docid;
	}
}
</script>

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

<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  -->
<script language="javascript">
function deleteroomassign(id)
{	
	if (confirm('Are You Sure You Want To Delete?')) {
		window.location.href = 'functions.php?action=deleteroomassign&id='+id;
	}
}
</script>
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
            <div class="horControlB">
            	<ul>
                    <li><a href="roomassignadd.php" title=""><img src="images/icons/control/16/hire-me.png" alt="" /><span>Add Room Assign</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <div class="wrapper">
		<!-- Dynamic table -->
        <div class="widgets">
        	<!-- 1 columns widgets -->
            <div class="oneTwo">            
                <!-- Partners list widget -->
				<div class="widget">
				<div class="title"><img src="images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Room Assign List</h6></div>                          
				<table cellpadding="0" cellspacing="0" border="0" class="display dTable">
				<thead>
				<tr>
				<th>Sr No.</th>
				<th>Room NO</th>
				<th>Doctor Name</th>
				<th>Date</th>
				<th>Action</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$sql_list="select * from roomassign order by id";
					$sql_list_query=mysql_query($sql_list)or die(mysql_error());
					$srno=1;
					while($row_list=mysql_fetch_assoc($sql_list_query))
					{
						$sql_list2="select * from doctormaster where docid='$row_list[doctorid]'";
						$sql_list_query2=mysql_query($sql_list2) or die(mysql_error());					
						$row_list2=mysql_fetch_assoc($sql_list_query2);
						$docname = strtoupper($row_list2['title']." ".$row_list2['fname']." ".$row_list2['mname']." ".$row_list2['lname']);
					?>
					<tr class="gradeA">                    
						<td><?php echo $srno; $srno++; ?></td>
						<td><?php echo $row_list['roomno']; ?></td>
						<td><?php echo $docname; ?></td>
						<td><?php echo date('d-m-Y',strtotime($row_list['assigndate'])); ?></td>
						<td align="center">
						<a href="javascript:deleteroomassign('<? echo $row_list[id]; ?>');"><img src="images/icons/remove.png" alt="" width="10"/></a></td>
					</tr>                
				<?
				}
				?>
				</tbody>
				</table>
				</div>
			</div>
		</div>
    </div>

</div>
<div class="clear"></div>

</body>
</html>