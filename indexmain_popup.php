<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');
/*
$pid = $_GET['pid'];
$sqlselect = "SELECT * from patientdetail where pid='$pid'";
//echo $sqlselect."<br>";
$sqlresult  = mysql_query($sqlselect) or die(mysql_error());
$sql_data   = mysql_fetch_assoc($sqlresult);
//echo mysql_num_rows($sqlresult); die;
*/
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
<script type="text/javascript" >
function newWindow4(file,window)
{
WindowName="MyPopUpWindow";

settings=
"toolbar=no,location=no,directories=no,"+
"status=no,menubar=no,scrollbars=yes,"+
"resizable=no,width=1200,height=450";
   
    	msgWindow=open(file,window,settings);
    	if (msgWindow.opener == null) msgWindow.opener = self;
    	
function doctor()
$.ajax({
			type: "POST",
			url: "indexmain_ajax.php",
			data: "searchTxt="+searchTxt+"&clickType="+clickType,
			success: function(html){
			//alert("ajaxre2");									
							if(html)
							{
								$("#"+resultDiv).html(html);
								$("#"+resultDiv).show();					
							}
							else
							{
								return "NO DATA";						
							}									
						}
		});
}
</script>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>-->

<!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  -->
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
                <h5>Welcome,</h5>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <div class="wrapper">
    	
        <!-- Form -->        
        <form id="validate" class="form" method="post" action="">
             <fieldset>
                <div class="widget">                    
                   <div class="formRow">
                        <label>Case No :</label>
                        <?php 
									$sqlcase = "select MAX(caseno) as MAXID from checkup";
									$rscase = mysql_query($sqlcase)or die(mysql_error());
									$row = mysql_fetch_assoc($rscase);
									$numcase = mysql_num_rows($rscase);
									if($row['MAXID']!="" && $row['MAXID']>0){
										$txtcase=$row['MAXID']+1;
										}else{
										$txtcase=1;
										}
                         ?>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtcase" id="txtcase" value="<?php echo $txtcase;?>" readonly="readonly"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Room No:</label>
                        <div class="formRight"><span class="oneTwo">
      						<select name="room" id="room" onchange="doctor();">
	        					<option value="1" <? if($room==1){?>selected<? }?>>1</option>
	        					<option value="2" <? if($room==2){?>selected<? }?>>2</option>
	        					<option value="3" <? if($room==3){?>selected<? }?>>3</option>
	        					<option value="4" <? if($room==4){?>selected<? }?>>4</option>
	        					<option value="5" <? if($room==5){?>selected<? }?>>5</option>
	        					<option value="6" <? if($room==6){?>selected<? }?>>6</option>
	        					<option value="7" <? if($room==7){?>selected<? }?>>7</option>
	        					<option value="8" <? if($room==8){?>selected<? }?>>8</option>
	        					<option value="9" <? if($room==9){?>selected<? }?>>9</option>
	        					<option value="10" <? if($room==10){?>selected<? }?>>10</option>
								<option value="11" <? if($room==11){?>selected<? }?>>11</option>
	        					<option value="12" <? if($room==12){?>selected<? }?>>12</option>
	        					<option value="13" <? if($room==13){?>selected<? }?>>13</option>
	        					<option value="14" <? if($room==14){?>selected<? }?>>14</option>
	        					<option value="15" <? if($room==15){?>selected<? }?>>15</option>
	        					<option value="16" <? if($room==16){?>selected<? }?>>16</option>
	        					<option value="17" <? if($room==17){?>selected<? }?>>17</option>
	        					<option value="18" <? if($room==18){?>selected<? }?>>18</option>
	        					<option value="19" <? if($room==19){?>selected<? }?>>19</option>
	        					<option value="20" <? if($room==20){?>selected<? }?>>20</option>        					
          					</select></span></div>
                        <div class="clear"></div>
                    </div> 
                     <div class="formRow">
                        <label>Search Doctor:</label>
                        <?php 
								$sqldoc="select * from checkup ";
								$rsdoc=mysql_query($sqldoc) or die(mysql_error());
								?>
                        <div class="formRight"><span class="oneTwo">
                        <select name="doctor">
								<?php while($datadoc=mysql_fetch_assoc($rsdoc)) { ?>		
        						<option value="<? echo $datadoc[''];?>" <? if($doctor==$datadoc['']){?> selected<? }?> > <? echo $datadoc[''];?></option>
    							<?php 
								}
								?>
								</select></span></div>
                        <div class="clear"></div>
                    </div>                                     
                    <div class="formRow">
                        <label>Check Up :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="checkbox" class="validate[required]" name="txtcheckup" id="txtcheckup" value="<?php echo $sql_data['lname'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formSubmit">
                    <div class="loginmsg"><label for="remMe"><?php echo $msg;?></label></div>
                    <input type="submit" name="submit" value="OK" class="redB" onclick="return funsubmit()" /></div>
                    <div class="clear"></div>                    
                </div>
            </fieldset>
        </form>
    </div>
    <?
    if(isset($submit)){
    ?>
    <!-- Main content wrapper -->
    <div class="wrapper">
    
            
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
            <!--<th>Standard</th>
        		<th>Address</th>
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
            if($txtgroupid=='ALL') {
            	$sql_list="select * from patientmaster where fname like '%$txtSearch%' OR lname like '%$txtSearch%' OR mname like '%$txtSearch%'";
            }else {
            	$sql_list="select * from patientmaster where incomingid='$txtgroupid' AND (fname like '%$txtSearch%' OR lname like '%$txtSearch%' OR mname like '%$txtSearch%')";		
            }
            		
            
				//echo $sql_list."<br>";
				$sql_list_query=mysql_query($sql_list) or die(mysql_error());
				$sql_list_num=mysql_num_rows($sql_list_query) or die(mysql_error());
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
                    <td><?php echo $row_list['dob']; ?></td>
                    <td><?php echo $row_list['gender']; ?></td>
                <!--<td><?php echo $row_list['standard']; ?></td>
                	  <td><?php echo $row_list['address']; ?></td>
                    <td><?php echo $row_list['city']; ?></td>
                    <td><?php echo $row_list['state']; ?></td>
                    <td><?php echo $row_list['zip']; ?></td>
                    <td><?php echo $row_list['phone']; ?></td>
                    <td><?php echo $row_list['mobile']; ?></td>
						  <td><?php echo $row_list['emailid']; ?></td>-->
                    <td align="center"><a href="patientadd.php?action=edit&pid=<? echo $row_list[pid];?>" ><img src="images/icons/edit.png" alt="" width="15"/></a>&nbsp;&nbsp;
							<a href="javascript:newWindow4('indexmain_popup.php?code=<? echo $dataincoming['code'];?>&fname=<? echo $row_list['fname'];?>&mname=<? echo $row_list['mname'];?>&lname=<? echo $row_list['lname'];?>','window2')">POPUP</a>                    
                    </td>
                </tr>                
            <?
				}
			}
			?>
            </tbody>
            </table>  
        </div>
                
    		</div>
		</div>
		<div class="clear"></div>
<?
}
?>

</body>
</html>