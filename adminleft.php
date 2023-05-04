<?php
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$pageName = $parts[count($parts) - 1];
//echo $pageName;
?>
<div id="leftSide">  
    
    <div class="" style="text-align:center"><img src="images/NMSFinallogocc.png" height="" width="100" alt="" ></div>
	<!-- Left navigation -->
    <ul id="menu" class="nav">
        <li class="dash"><a href="indexmain.php" title="" <? if($pageName=="indexmain.php"){ ?> class="active" <? } ?>><span>Dashboard</span></a></li>
        <li class="ui"><a href="checkup.php" title="" <? if($pageName=="checkup.php"){ ?> class="active" <? } ?>><span>Check Up Patient</span></a></li>
			<!--<li class="ui"><a href="patientlist.php" title="" <? if($pageName=="patientlist.php"){ ?> class="active" <? } ?>><span>Patient Master</span></a></li>-->
        <li class="admin"><a href="#" title="" <? if($pageName!="indexmain.php" && $pageName!="checkup.php" && $pageName!="patientlist.php"){ ?> class="active" <? } ?>><span>Admin</span></a>
            <ul class="sub">
                <li><a href="doctorlist.php" title="">Doctor Master</a></li>
                <li><a href="roomassignlist.php" title="">Room Assign Master</a></li>
                <li><a href="incomingsourcelist.php" title="">Incoming Source Master</a></li>
                <? if($_SESSION['userType']=="1" or $_SESSION['userType']=="2"){?>
				<li><a href="roomlist.php" title="">Room Master</a></li>                
                <li><a href="userlist.php" title="">User Master</a></li>
				<? } ?>
				<? if($_SESSION['userType']=="2"){?>				
                <li><a href="paramgrouplist.php" title="">Parameter Group</a></li>
                <li><a href="paramtypelist.php" title="">Parameter Master</a></li>				
				<? } ?>				
            </ul>
        </li>
    </ul>
	
</div>

