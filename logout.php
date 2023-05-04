<?php 
session_start();
unset($_SESSION['loginType']);
unset($_SESSION['loginId']);
header("Location: index.php");
?>