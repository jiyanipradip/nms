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
                <h5>Admin</h5>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="line"></div>
    
    <!-- Main content wrapper -->
    <!-- Page statistics and control buttons area -->
    <div class="statsRow">
        <div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="userlist.php" title=""><span>1. User Master</span></a></li>
                </ul>
            </div>
        
        </div>
        <div class="line"></div>
        <div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="paramgrouplist.php" title=""><span>2. Parameter Group</span></a></li>
                </ul>
            </div>
        
        </div>    
    	 <div class="line"></div>
		<div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="paramtypelist.php" title=""><span>3. Parameter Master</span></a></li>
                </ul>
            </div>
        
        </div>    
    	 <div class="line"></div>
        <!--<div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="categorylist.php" title=""><span>4. Category Master</span></a></li>
                </ul>
            </div>
        
        </div>    
    	 <div class="line"></div>-->
    	 <div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="incomingsourcelist.php" title=""><span>4. Incoming Source Master</span></a></li>
                </ul>
            </div>
        
        </div>    
    	 <div class="line"></div>
    	 <div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="patientlist.php" title=""><span>5. Patient Master</span></a></li>
                </ul>
            </div>
        
        </div>    
     <div class="line"></div>
    	 <div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="doctorlist.php" title=""><span>6. Doctor Master</span></a></li>
                </ul>
            </div>
        
        </div>    
     <div class="line"></div>
     <div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="roomlist.php" title=""><span>7. Room Master</span></a></li>
                </ul>
            </div>
        
        </div>    
     <div class="line"></div>
      <div class="wrapper">        
        	<div class="">
            	<ul>
                    <li><a href="roomassignlist.php" title=""><span>8. Room Assign Master</span></a></li>
                </ul>
            </div>
        
        </div>    
     <div class="line"></div>
		 
    
</div>

<div class="clear"></div>

</body>
</html>