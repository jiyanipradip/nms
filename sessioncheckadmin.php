<?php
if (!isset($_SESSION['loginId'])) 
{
	header ("Location:index.php"); die;
}
?>