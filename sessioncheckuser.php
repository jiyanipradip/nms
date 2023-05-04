<?php
if (!isset($_SESSION['loginId']) || $_SESSION['loginType']!='user') 
{
	header ("Location:index.php"); die;
}
$loginId=$_SESSION['loginId'];
$loginType=$_SESSION['loginType'];
$bid=$_SESSION['businessId'];
$superUser=$_SESSION['superUser'];
//$serverPath = "http://www.xyz.com/admin/new/";
//$emailImagePath = "http://www.xyz.com/admin/new/photo/";
//echo $loginId."-".$loginType."-".$bid."-".$superUser;
?>