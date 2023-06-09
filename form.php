<?php
session_start();
require_once('sessioncheckadmin.php');
include('connection.php');

$sqlUser="select * from userlogin where id='".$_SESSION['loginId']."'";
//echo $sqlUser; die;
$rsUser=mysql_query($sqlUser)or die(mysql_error());
$dataUser=mysql_fetch_assoc($rsUser);
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
                <h5>Form</h5>
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
                <div class="widget">                    
                    <div class="formRow">
                        <label>Username :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtUsername" id="txtUsername" value="<?php echo $sql_data['username'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Password :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="password" class="validate[required]" name="txtPassword" id="txtPassword" value="<?php echo $sql_data['password'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Email Id :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required,custom[email]]" name="txtEmail" id="txtEmail" value="<?php echo $sql_data['emailid'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                     <div class="formRow">
                        <label>PhoneNo :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtPhoneNo" id="txtPhoneNo" value="<?php echo $sql_data['phoneNo'];?>"/></span></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>UserType :</label>
                        <div class="formRight"><span class="oneTwo">
                        <input type="text" class="validate[required]" name="txtUserType" id="txtUserType" value="0" <?php if($data['userType']=='0'){ echo "checked=checked"; }?>/></span></div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="formRow">
                        <label>Set Default Message :</label>
                        <div class="formRight"><input type="checkbox" name="chkDefaultMessage" id="chkDefaultMessage" value="1" <?php if($data['defalutMessage']=='1'){ echo "checked=checked"; }?>/></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Set Default Message :</label>
                        <div class="formRight"><input type="radio" name="chkDefaultMessage" id="chkDefaultMessage" value="1" <?php if($data['defalutMessage']=='1'){ echo "checked=checked"; }?>/></div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label>Yahoo Travel Link :</label>
                        <div class="formRight"><textarea rows="3" cols="" name="txtYahooTravel"></textarea></div>
                        <div class="clear"></div>
                    </div>
                    
                    
                    
                    
                    <div class="formSubmit"><input type="submit" name="submit" value="submit" class="redB" /></div>
                    <div class="clear"></div>                    
                </div>
            </fieldset>
        </form>
    </div>
    
    
</div>

<div class="clear"></div>

</body>
</html>