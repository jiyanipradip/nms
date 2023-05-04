<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');

$docid = $_GET['docid'];
$sqlselect = "SELECT * from doctormaster where docid='$docid'";
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
                <h5>Add Doctor</h5>
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
        <?php
			$pid = $_GET['pid']; 
			if($_GET['action']=="edit")
			{
			?>
        <form id="validate" class="form" method="post" action="functions.php?action=modifydoctor&docid=<? echo $docid; ?>">
             <fieldset>
                <div class="widget">                    
                   <div class="formRow">
                        <label>Doccode :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtdoccode" id="txtdoccode" value="<?php echo $sql_data['doccode'];?>" readonly="readonly"/></span></div>
                        <div class="clear"></div>
                    </div>
	                <div class="formRow">
                        <label>Title :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txttitle" id="txttitle" value="<?php echo $sql_data['title'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>First Name :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtfname" id="txtfname" value="<?php echo $sql_data['fname'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Last Name :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtlname" id="txtlname" value="<?php echo $sql_data['lname'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Middle Name :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtmname" id="txtmname" value="<?php echo $sql_data['mname'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>                    
                    <div class="formRow">
						<?php 
                        $txtdob = $sql_data['dob'];
                        $txtdob1 = explode('-',$txtdob);
                        $txtdob2 =$txtdob1[2].'-'.$txtdob1[1].'-'.$txtdob1[0];                    
                        ?>
                        <label>DOB :</label>
                        <div class="formRight"><span class="oneFour">
                        <input type="text" class="maskDateDash" name="txtdob" id="txtdob" value="<?php echo $txtdob2;?>" placeholder="dd-mm-yyyy"/>
                        <span class="formNote">&nbsp;&nbsp;DD-MM-YYYY</span></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Gender :</label>
                        <div class="formRight">
                        <input type="radio" name="txtsex" id="txtmale" value="MALE" checked="checked"  
                        <?php
										if($sql_data['gender']=="MALE")
										{
								?>
                					checked="checked";
                			<?php
								}
								?> />MALE <br>
                        <input type="radio" name="txtsex" id="txtfemale" value="FEMALE" 
                        <?php
										if($sql_data['gender']=="FEMALE")
										{
								?>
                					checked="checked";
                			<?php
								}
								?>
                        />FEMALE</div>
                        <div class="clear"></div>
                    </div>
							<div class="formRow">
                        <label>Address :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtaddress" id="txtaddress" value="<?php echo $sql_data['address'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>City :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtcity" id="txtcity" value="<?php echo $sql_data['city'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>State :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtstate" id="txtstate" value="<?php echo $sql_data['state'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>zip :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtzip" id="txtzip" value="<?php echo $sql_data['zip'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Phone No :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtphone" id="txtphone" value="<?php echo $sql_data['phone'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Mobile No :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtmobile" id="txtmobile" value="<?php echo $sql_data['mobile'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Email Id :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtemail" id="txtemail" value="<?php echo $sql_data['emailid'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    
                    
                    <div class="formSubmit">
                    <div class="loginmsg"><label for="remMe"><?php echo $msg;?></label></div>
                    <input type="submit" name="submit" value="submit" class="redB" />
                    <a href="doctorlist.php" title="" class="button redB" style="margin: 5px;"><span><< Back</span></a>
                    </div>
                    <div class="clear"></div>                    
                </div>
            </fieldset>
        </form>
        <? } else { ?>
		  <form id="validate" class="form" method="post" action="functions.php?action=adddoctor">
            <fieldset>
                <div class="widget">
                	 <div class="formRow">
                        <label>Doccode :</label>
                        <?php 
									$sqldoc = "select MAX(doccode) as MAXID from doctormaster";
									$rsdoc = mysql_query($sqldoc)or die(mysql_error());
									$row = mysql_fetch_assoc($rsdoc);
									$numdoc = mysql_num_rows($rsdoc);
									if($row['MAXID']!="" && $row['MAXID']>0){
										$txtdoc=$row['MAXID']+1;
										}else{
										$txtdoc=101;
										}
                         ?>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtdoccode" id="txtdoccode" value="<?php echo $txtdoc;?>" readonly="readonly"/></span></div>
                        <div class="clear"></div>
                    </div>
	                <div class="formRow">
                        <label>Title :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txttitle" id="txttitle" value="<?php echo $sql_data['title'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>First Name :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtfname" id="txtfname" value="<?php echo $sql_data['fname'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Last Name :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtlname" id="txtlname" value="<?php echo $sql_data['lname'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Middle Name :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtmname" id="txtmname" value="<?php echo $sql_data['mname'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>DOB :</label>
                        <div class="formRight"><span class="oneFour">
                        <input type="text" class="maskDateDash" name="txtdob" id="txtdob" value="<?php echo $txtdob2;?>" placeholder="DD-MM-YYYY"/>
                        <span class="formNote">&nbsp;&nbsp;DD-MM-YYYY</span></span></div>
                        <div class="clear"></div>
                    </div>
                   <div class="formRow">
                        <label>Gender :</label>
                        <div class="formRight"><input type="radio" name="txtsex" id="txtsex" value="MALE" checked="checked"/>MALE <br>
                        <input type="radio" name="txtsex" id="txtsex" value="FEMALE"/>FEMALE</div>
                        <div class="clear"></div>
                    </div>
							<div class="formRow">
                        <label>Address :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtaddress" id="txtaddress" value="<?php echo $sql_data['address'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>City :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtcity" id="txtcity" value="<?php echo $sql_data['city'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>State :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtstate" id="txtstate" value="<?php echo $sql_data['state'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>zip :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtzip" id="txtzip" value="<?php echo $sql_data['zip'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Phone No :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtphone" id="txtphone" value="<?php echo $sql_data['phone'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Mobile No :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtmobile" id="txtmobile" value="<?php echo $sql_data['mobile'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Email Id :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="" name="txtemail" id="txtemail" value="<?php echo $sql_data['emailid'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    
                    
                    <div class="formSubmit">
                    <div class="loginmsg"><label for="remMe"><?php echo $msg;?></label></div>
                    <input type="submit" name="submit" value="submit" class="redB" />
                    <a href="doctorlist.php" title="" class="button redB" style="margin: 5px;"><span><< Back</span></a>
                    </div>
                    <div class="clear"></div>                    
                </div>
            </fieldset>
        </form>
        <? } ?>
    </div>
    
    
</div>

<div class="clear"></div>

</body>
</html>