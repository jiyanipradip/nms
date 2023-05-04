<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');

$id = $_GET['id'];
$sqlselect = "SELECT * from roomassign where id='$id'";
//echo $sqlselect."<br>";
$sqlresult  = mysql_query($sqlselect) or die(mysql_error());
$sql_data   = mysql_fetch_assoc($sqlresult);
//echo mysql_num_rows($sqlresult); die;

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
<script type="text/javascript">
function validate()
{
	var txtdate = document.getElementById('txtdate').value;
	var cboroom = document.getElementById('cboroom').value;
	//alert(txtdate+"="+cboroom);
	if(txtdate=="" || cboroom=="")
	{
		alert("Please Select Date and Room !!!");
		return false;
	}
	/*else{
		window.location.href = "<? echo $_SERVER['PHP_SELF']; ?>?date="+txtdate+"&room="+cboroom;
	}*/
}

function check(docid) {
  if (checkbox.checked == true) {
  	 //alert(docid.value);
    //confirm("Are you sure you want to do this?");
    return true;
  } else {
    return false;
  }
}


</script>
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
                <h5>Add Room Assign</h5>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <div class="wrapper">    	
		  <form id="validate" class="form" method="post" action="" >
            <fieldset>
                <div class="widget">                
                   
                <div class="formRow">
                    <label>Select Date:</label>
                    <div class="formRight">
						<? if($_POST['txtdate']!=""){ $txtdate = $_POST['txtdate']; }else{ $txtdate = date('d-m-Y'); } ?>
                        <input type="text" class="datepicker maskDateDash" name="txtdate" id="txtdate" value="<? echo $txtdate;?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                    <div class="formRow">
                        <label>Select Room :</label>
                        <div class="formRight">
                        <select name="cboroom" id="cboroom">
        						<option value="">--Select Room--</option>
       						<?
								$sqlroom = "select * from roommaster";
								$rsroom = mysql_query($sqlroom) or die(mysql_error());
								while($dataroom = mysql_fetch_assoc($rsroom)) 
								{
								?>
								<option value="<? echo $dataroom['id'];?>" <? if($_POST['cboroom']==$dataroom['id']){?> selected="selected"<? }?>><? echo strtoupper($dataroom['roomno']);?></option>
								<?
								}
       						?>
        						</select> </div>
                        <div class="clear"></div>
                    </div>
                    
                    
                    <div class="formSubmit">
                    <div class="loginmsg"><label for="remMe"><?php echo $msg;?></label></div>
                    <input type="submit" name="submit" value="submit" class="redB" onClick="return validate()" />
					<a href="roomassignlist.php" title="" class="button redB" style="margin: 5px;"><span><< Back</span></a>
					</div>
                    <div class="clear"></div>                    
                </div>
            </fieldset>
        </form>
    </div>
	
		
	<? if($_POST['submit']){ ?>
	<form id="validate" class="form" method="post"  action="functions.php?action=addroomassign&date1=<? echo $_POST['txtdate']?>&cboroom=<? echo $_POST['cboroom']?>">
	<!-- Main content wrapper -->
    <div class="wrapper">	
		<!-- 1 columns widgets -->
        <div class="oneTwo">
		<!-- Table with check all checkboxes fubction -->
		<div class="widget">         
			<div class="title"><span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span><h6>Static table with checkboxes</h6></div>
          <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck" id="checkAll">
              <thead>
                  <tr>
                      <td><img src="images/icons/tableArrows.png" alt="" /></td>
                      <td>Doctor ID</td>
                      <td>Doctor Name</td>
                  </tr>
              </thead>
              <tbody>
			<?php
			$sql_list="select * from doctormaster order by docid";
			$sql_list_query=mysql_query($sql_list) or die(mysql_error());
			$sql_list_num=mysql_num_rows($sql_list_query) or die(mysql_error());
			if($sql_list_num > 0)
			{
				$srno=1;
				$txtdate= date('Y-m-d', strtotime($_POST['txtdate']));
				while($row_list=mysql_fetch_assoc($sql_list_query))
				{
					$sqlchk = "select * from roomassign where doctorid='$row_list[docid]' and assigndate='$txtdate'";
					//echo $sqlchk."<br>";
					$rschk = mysql_query($sqlchk)or die(mysql_error());
					if(mysql_num_rows($rschk)==0){
				?>	  
                  <tr>
                      <td><input type="checkbox" id="titleCheck2" name="checkbox[]" value="<? echo $row_list['docid']; ?>"/></td>
                      <td><?php echo $row_list['docid']; ?></td>
                      <td><?php echo strtoupper($row_list['lname'].' '.$row_list['fname'].' '.$row_list['mname']); ?></td>
                  </tr>
				<? 
					}
				}
			} 
		?>
              </tbody>
          </table>
		</div>
		</div>
		
        <div class="clear"></div>
	</div>	
	<!-- Main content wrapper -->
    <div class="wrapper">
		<!-- 1 columns widgets -->
        <div class="oneTwo">
		<!-- Table with check all checkboxes fubction -->		
			<div class="formSubmit"><input type="submit" value="submit" class="dblueB" onClick="return validate()"/></div>
		</div>
		<div class="clear"></div>
	</div>
	</form>
	<? } ?>

</body>
</html>