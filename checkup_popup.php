<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
$pid = $_GET['pid'];
$sqlselect = "SELECT * from patientmaster where pid='$pid'";
$sqlresult  = mysql_query($sqlselect) or die(mysql_error());
$sql_data   = mysql_fetch_assoc($sqlresult);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>NMS</title>
<link href="css/main_popup.css" rel="stylesheet" type="text/css" />

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
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->
<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  -->
<script type="text/javascript">
function funRoomNO(obj,pid){
	if(obj.value=="select"){
		alert("Please Select Room No !!!");
		var ckdate = document.getElementById("ckdate").value;
		window.location.href="<? echo $_SERVER['PHP_SELF']?>?pid="+pid+"&ckdate="+ckdate; 
		return false;
	}else{
		var ckdate = document.getElementById("ckdate").value;
		window.location.href="<? echo $_SERVER['PHP_SELF']?>?pid="+pid+"&ckdate="+ckdate+"&roomno="+obj.value; 
	}	
}
</script>
</head>
<body>

<!-- Left side content -->
<?php //require_once("adminleft.php");?>

<!-- Right side -->
    <!-- Top fixed navigation -->
    <?php //require_once("admintop.php");?>
    
      
	<!-- Main content wrapper -->
    <div class="wrapper">
    	
        <!-- Note -->
			<!--<div class="">
         <a href="checkup_print.php?pid=<? echo $pid; ?>" title="" class="button redB" style="margin:5px;float:right;"><span>Print</span></a>
			</div>-->
        <div class="">
         <p><strong>PATIENT NAME : <? echo $sql_data['fname']." ".$sql_data['mname']." ".$sql_data['lname']; ?></strong></p>
			<p><strong>DOB : <? echo date('d-m-Y', strtotime($sql_data['dob'])); ?></strong></p>
        </div>
        
        <!-- Form -->
        <form id="validate" class="form" method="post" action="functions.php?action=addcheckup&pid=<? echo $_GET['pid']; ?>">
            <fieldset>
                <div class="widget">
                    <div class="title"><img src="images/icons/dark/list.png" alt="" class="titleIcon" /><h6>Check Up Patient</h6></div>
                    
                    <div class="formRow">
                        <label>Case No :
                        <?php 
								$sqlcase = "select MAX(caseno) as MAXID from checkup";
								//echo $sqlcase;
								$rscase = mysql_query($sqlcase)or die(mysql_error());
								$row = mysql_fetch_assoc($rscase);
								$numcase = mysql_num_rows($rscase);
								if($row['MAXID']!="" && $row['MAXID']>0){
									$txtcase1 = $row['MAXID']+1;
									$txtcase = str_pad($txtcase1, 4, '0', STR_PAD_LEFT);
								}else{
									$txtcase = '0001';
								}
                         ?>
							</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtcase" id="txtcase" value="<?php echo $txtcase;?>" readonly="readonly"/></span></div>
                        <div class="clear"></div>
                    </div>
					
					<div class="formRow">
						<label>Select Date:</label>
						<div class="formRight">
							<? if($_GET['ckdate']!=""){ $txtdate = $_GET['ckdate']; }else{ $txtdate = date('d-m-Y'); } ?>
							<input type="text" class="datepicker maskDateDash" name="ckdate" id="ckdate" value="<? echo $txtdate;?>" />
						</div>
						<div class="clear"></div>
					</div>

					<div class="formRow">
                        <label>Select Room No :</label>
                        <div class="formRight"><span class="oneTwo">
      						<select name="cboroom" id="cboroom" onchange="funRoomNO(this,'<? echo $_GET['pid'];?>');">
	        					<option value="select">-- Select Room --</option>
								<?
								$sqlroom = "select * from roommaster";
								$rsroom = mysql_query($sqlroom) or die(mysql_error());
								while($dataroom = mysql_fetch_assoc($rsroom)) 
								{
								?>
								<option value="<? echo $dataroom['id'];?>" <? if($dataroom['id']==$roomno){?> selected="selected"<? }?>><? echo strtoupper($dataroom['roomno']);?></option>
								<?
								}
								?>        					
          					</select></span></div>
                        <div class="clear"></div>
                    </div>
					
					<? if($pid!="" && $roomno!=""){?>
						<div class="formRow">
							<label>Select Doctor :</label>
							<div class="formRight"><span class="oneTwo">
								<select name="cbodoctor" id="cbodoctor">
									<option value="">--Select Doctor--</option>
									<?
									$ckdate = date('Y-m-d', strtotime($_GET['ckdate']));
									$sqlroom = "select * from roomassign where assigndate='$ckdate' and roomno='$roomno'";
									$rsroom = mysql_query($sqlroom) or die(mysql_error());
									while($dataroom = mysql_fetch_assoc($rsroom)) 
									{
										$sqldoc = "select * from doctormaster where docid='$dataroom[doctorid]'";
										$rsdoc = mysql_query($sqldoc);
										$datadoc = mysql_fetch_assoc($rsdoc);										
										?>
										<option value="<? echo $datadoc['docid'];?>"><? echo strtoupper($datadoc['title'].' '.$datadoc['fname'].' '.$datadoc['mname'].' '.$datadoc['lname']);?></option>
									<?
									}
									?>        					
								</select></span></div>
							<div class="clear"></div>
						</div>
						
							<div class="formSubmit">
								<div class="loginmsg"><label for="remMe"><?php echo $msg;?></label></div>
								<input type="submit" name="submit" value="submit" class="redB" />
								<a href="#" onclick="javascript:window.close();" title="" class="button redB" style="margin: 5px;"><span>Close</span></a>	
								<div class="clear"></div>
							</div>
							
					<? }?>                    
                </div>
            </fieldset>
		</form>
</body>
</html>