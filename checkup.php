<?php
session_start();
require_once('sessioncheckadmin.php');
//echo "<pre>"; print_r($_SESSION);
include('connection.php');
//$url1=$_SERVER['REQUEST_URI'];
//header("Refresh:25; URL=$url1");
?>
<script type="text/javascript" >
function deletepatient(pid,iid)
{	
	if (confirm('Are You Sure You Want To Delete?')) {
		window.location.href = "functions.php?action=deletepatient&pid="+pid+"&iid="+iid+"&backurl=checkup";
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
<script type="text/javascript" >
function newWindow4(file,window)
{
	WindowName="MyPopUpWindow";
	settings="toolbar=no,location=no,directories=no,"+"status=no,menubar=no,scrollbars=yes,"+"resizable=no,width=1100,height=500";
    msgWindow=open(file,window,settings);
    if (msgWindow.opener == null) msgWindow.opener = self;
}

function funsubmit()
{
	
	var iid = document.getElementById('txtgroupid').value;
	var txtSearch = document.getElementById('txtSearch').value;
	//alert(iid+"="+txtSearch);
	window.location.href = "<? echo $_SERVER['PHP_SELF'];?>?iid="+iid+"&txtSearch="+txtSearch;
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
            <div class="horControlB">
            	<ul>
                    <li><a href="patientadd.php" title=""><img src="images/icons/control/16/hire-me.png" alt="" /><span>Add New Patient</span></a></li>
  			 <!--<li><a href="adminmain.php" title=""><img src="images/icons/control/16/refresh.png"  alt=""/><span>Back</span></a></li>-->
                </ul>
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
                        <label>Incoming Source :</label>
                        <div class="formRight searchDrop">
                        <select class="chzn-select" style="width:350px;" tabindex="2" name="txtgroupid" id="txtgroupid">
                        <? $iidArray=array();$iidArray['ALL']='ALL PATIENT LIST'; ?>
                       		<option value="ALL">ALL</option>
                        <? 
                        	//$iidArray=array();
                        	$sqlinc = "select * from incomingsourcemaster";
									$rsinc = mysql_query($sqlinc);
									while($datainc = mysql_fetch_assoc($rsinc)) 
									{
											$iidArray[$datainc['id']]=$datainc['code'].'-'.$datainc['name'];
								?>
											<option value="<? echo $datainc['id'];?>" <? if($datainc['id']==$iid){?> selected="selected"<? }?>><? echo $datainc['code'].'-'.$datainc['name'];?></option>
								<?
									}
								?>	
                        </select></div>
                        <div class="clear"></div>
                    </div>                    
                     <div class="formRow">
                        <label>Search Name:</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" name="txtSearch" id="txtSearch" value="<?php echo $txtSearch;?>"/></span></div>
                        <div class="clear"></div>
                    </div>                                     
                    
                    <div class="formSubmit">
                    <div class="loginmsg"><label for="remMe"><?php echo $msg;?></label></div>
                    <input type="button" name="submit" value="submit" class="redB" onclick="return funsubmit()" /></div>
                    <div class="clear"></div>                    
                </div>
            </fieldset>
        </form>
    </div>
    <?
    //if(isset($submit)){
    ?>
    <!-- Main content wrapper -->
    <div class="wrapper">
    
            
    	  <!-- Dynamic table -->
        <div class="widget">
        <div class="title"><img src="images/icons/dark/full2.png" alt="" class="titleIcon" /><h6><? if($iidArray[$iid]!=""){ echo $iidArray[$iid]; }else{ echo "Please Select Incoming Source"; }?></h6></div>                                         
            <table cellpadding="0" cellspacing="0" border="0" class="display dTable">
            <thead>
            <tr>
				<th>Sr.No.</th>            
            <th>Incoming Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>            
				<th>DOB</th>
            <th>Gender</th>
            <th>Village</th>
            <th>Action</th>
				<th>Checkup</th>
            </tr>
            </thead>
            <tbody>
            <?php
            /*if($txtgroupid=='ALL') {
            	$sql_list="select * from patientmaster where fname like '%$txtSearch%' OR lname like '%$txtSearch%' OR mname like '%$txtSearch%'";
            }else {
            	$sql_list="select * from patientmaster where incomingid='$txtgroupid' AND (fname like '%$txtSearch%' OR lname like '%$txtSearch%' OR mname like '%$txtSearch%')";		
            }*/
			
			if($iid=="ALL"){
					if($txtSearch!=''){
						$sql_list = "select * from patientmaster where fname like '%$txtSearch%' OR mname like '%$txtSearch%' OR lname like '%$txtSearch%'";
					}else{
						$sql_list="select * from patientmaster order by pid ";
					}
				}else{
					if($txtSearch!=''){
						$sql_list="select * from patientmaster where incomingid ='$iid' AND (fname like '%$txtSearch%' OR mname like '%$txtSearch%' OR lname like '%$txtSearch%') order by pid ";
					}else{
						$sql_list="select * from patientmaster where incomingid ='$iid' order by pid ";
					}
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
					
					$sqlckp = "select * from checkup where pid='$row_list[pid]'";
					$rsckp = mysql_query($sqlckp)or die(mysql_error());
					$datackp =  mysql_fetch_assoc($rsckp);
					if(mysql_num_rows($rsckp)>0){
						$bgclr = "gradeC";
						$actionTxt = "CHECK UP DONE";
						$checkflag = '1';
					}else{
						$bgclr = "gradeA";
						$actionTxt = "CHECK UP";
						$checkflag = '0';
					}
					
				?>
                <tr class="<? echo $bgclr;?>" id="div_<? echo $row_list['pid'];?>">
                    <td id="div2_<? echo $row_list['pid'];?>"><?php echo $srno; $srno++; ?></td>
                    <td><?php echo $dataincoming['name']; ?></td>
                    <td><?php echo strtoupper($row_list['fname']); ?></td>                    
                    <td><?php echo strtoupper($row_list['mname']); ?></td>
                    <td><?php echo strtoupper($row_list['lname']); ?></td>
                    <td><?php echo date('d-m-Y',strtotime($row_list['dob'])); ?></td>
                    <td><?php echo $row_list['gender']; ?></td>
                    <td><?php echo strtoupper($row_list['city']); ?></td>
                    <td align="center"><a href="patientadd.php?action=edit&pid=<? echo $row_list[pid];?>&iid=<? echo $iid;?>&txtSearch=<? echo $txtSearch;?>" ><img src="images/icons/edit.png" alt="" width="10"/></a>&nbsp;&nbsp;
                    <a href="javascript:deletepatient('<? echo $row_list[pid];?>','<? echo $iid; ?>','<? echo $txtSearch; ?>');"><img src="images/icons/remove.png" alt="" width="10"/></a>&nbsp;&nbsp;
                    <? if($checkflag=='1') {?> <a href="javascript:newWindow4('checkup_print.php?pid=<? echo $row_list['pid'];?>','window2')"> <img src="images/icons/control/32/print.png" alt="" width="10"/> </a></td> <? } ?>                
                    <td align="center"><a href="javascript:newWindow4('checkup_popup.php?pid=<? echo $row_list['pid'];?>','window2')"><span id="div1_<? echo $row_list['pid'];?>"><? echo $actionTxt;?></span></a></td>
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
//}
?>

</body>
</html>