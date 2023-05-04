<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
?>

<script language="javascript">
function deletepatient(pid)
{	
	if (confirm('Are You Sure You Want To Delete?')) {
		window.location.href = 'functions.php?action=deletepatient&pid='+pid;
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
<script type="text/javascript">
function fungroupid(obj)
{
	//alert(obj.value);
	if(obj.value=='select')
	{
		alert("Please Select Incoming Source!!!");
		return false;
	}
	else
	{ 
		window.location.href="<? echo $_SERVER['PHP_SELF']?>?iid="+obj.value;  
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
            <div class="pageTitle">
                <h5>Patient List</h5>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    <div class="wrapper">        
        	<div class="horControlB">
            	<ul>
                    <li><a href="patientadd.php" title=""><img src="images/icons/control/16/hire-me.png" alt="" /><span>Add New Patient</span></a></li>
  						  <li><a href="adminmain.php" title=""><img src="images/icons/prev.png"  alt="" width="10	"/><span>Back</span></a></li>
                </ul>
            </div>
    </div>
    
    
    
    <div class="wrapper">
    		                    
                   
                    <div class="formRow">
                        <label>Incoming Source :</label>
                        <div class="formRight searchDrop">
                        <select class="chzn-select" style="width:350px;" tabindex="2" name="txtgroupid" id="txtgroupid" onchange="fungroupid(this)">
                        <option value="select">--Select Incoming Source--</option>
                        <? 
                        	$sqlinc = "select * from incomingsourcemaster";
									$rsinc = mysql_query($sqlinc);
									while($datainc = mysql_fetch_assoc($rsinc)) 
									{
								?>
											<option value="<? echo $datainc['id'];?>" <? if($datainc['id']==$iid){?> selected="selected"<? }?>><? echo $datainc['code'].'-'.$datainc['name'];?></option>
								<?
									}
								?>	
                        </select></div>
                        <div class="clear"></div>
                    </div>
        
    
    <?php
          if($iid!=''){
				$sql_list="select * from patientmaster where incomingid ='$iid' order by pid ";
				//echo $sql_list."<br>";
				$sql_list_query=mysql_query($sql_list) or die(mysql_error());
				$sql_list_num=mysql_num_rows($sql_list_query) or die(mysql_error());
				?>
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
        
    	  <!-- Dynamic table -->
        <div class="widget">
        
                                            
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
				<th>Sr.No.</th>            
            <th>Incoming Code</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>            
				<th>DOB</th>
            <th>Gender</th>
            <th>Standard</th>
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
           	if($sql_list_num > 0)
           	{
           		$srno=1;
				while($row_list=mysql_fetch_assoc($sql_list_query))
				{
						$sqlincoming = "select * from incomingsourcemaster where id='$row_list[incomingid]'";
						$rsincoming = mysql_query($sqlincoming)or die(mysql_error());
						$dataincoming =  mysql_fetch_assoc($rsincoming);
				?>
                <tr class="gradeA">
                    <td><?php echo $srno; $srno++; ?></td>
                    <td><?php echo $dataincoming['code']; ?></td>
                    <td><?php echo strtoupper($row_list['fname']); ?></td>                    
                    <td><?php echo strtoupper($row_list['mname']); ?></td>
                    <td><?php echo strtoupper($row_list['lname']); ?></td>
                    <td><?php 
                    	$txtdob = $row_list['dob'];
							$txtdob1 = explode('-',$txtdob);
							$txtdob2 =$txtdob1[2].'/'.$txtdob1[1].'/'.$txtdob1[0];                    
                     echo $txtdob2; ?>   
                    </td>
                    <td><?php echo $row_list['gender']; ?></td>
                    <td><?php echo $row_list['standard']; ?></td>
                <!--<td><?php echo $row_list['address']; ?></td>
                    <td><?php echo $row_list['city']; ?></td>
                    <td><?php echo $row_list['state']; ?></td>
                    <td><?php echo $row_list['zip']; ?></td>
                    <td><?php echo $row_list['phone']; ?></td>
                    <td><?php echo $row_list['mobile']; ?></td>
						  <td><?php echo $row_list['emailid']; ?></td>-->
                    <td align="center"><a href="patientadd.php?action=edit&pid=<? echo $row_list[pid];?>" ><img src="images/icons/edit.png" alt="" width="15"/></a>&nbsp;&nbsp;
                    <a href="javascript:deletepatient('<? echo $row_list[pid]; ?>');"><img src="images/icons/remove.png" alt="" width="15"/></a></td>
                </tr>                
            <?
			}
			}
			?>
            </tbody>
            </table>  
        </div>
        
    
        </fieldset>
        </form>
        <?
        	}
			?>
    </div>
<br>
   
</div>

<div class="clear"></div>

</body>
</html>