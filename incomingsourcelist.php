<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
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

<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  -->
<script language="javascript">
function deleteincomingsource(id)
{	
	if (confirm('Are You Sure You Want To Delete?')) {
		window.location.href = 'functions.php?action=deleteincomingsource&id='+id;
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
                    <li><a href="incomingsourceadd.php" title=""><img src="images/icons/control/16/hire-me.png" alt="" /><span>Add New Incoming Source</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <div class="wrapper">
		<!-- Dynamic table -->
        <div class="widget">
            <div class="title"><img src="images/icons/dark/full2.png" alt="" class="titleIcon" /><h6>Incoming Source List</h6></div>                          
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
            <th>Code</th>
            <th>Code Type</th>
            <th>Name</th>
        <!--<th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone No</th>
            <th>Mobile No</th>
            <th>Email Id</th>-->
				<th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
				$sql_list="select *,p1.id as id , p2.id as gid ,p1.name as name,p2.name as codetype from incomingsourcemaster p1,paramtype p2 where p1.codetype=p2.id order by p1.id";
				$sql_list_query=mysql_query($sql_list)or die(mysql_error());
				while($row_list=mysql_fetch_assoc($sql_list_query))
				{
				?>
                <tr class="gradeA">
                    <td><?php echo $row_list['code']; ?></td>
                    <td><?php echo $row_list['codetype']; ?></td>
                    <td><?php echo strtoupper($row_list['name']); ?></td>
                <!--<td><?php echo $row_list['address']; ?></td>
                    <td><?php echo $row_list['city']; ?></td>
                    <td><?php echo $row_list['state']; ?></td>
                    <td><?php echo $row_list['zip']; ?></td>
                    <td><?php echo $row_list['phone']; ?></td>
                    <td><?php echo $row_list['mobile']; ?></td>
                    <td><?php echo $row_list['email']; ?></td>-->
                    <td align="center"><a href="incomingsourceadd.php?action=edit&id=<? echo $row_list[id];?>" ><img src="images/icons/edit.png" alt="" width="10"/></a>&nbsp;&nbsp;
                    <a href="javascript:deleteincomingsource('<? echo $row_list[id]; ?>');"><img src="images/icons/remove.png" alt="" width="10"/></a></td>
                </tr>                
            <?
			}
			?>
            </tbody>
            </table>  
        </div>
    </div>

</div>
<div class="clear"></div>

</body>
</html>