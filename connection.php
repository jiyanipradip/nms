<?php
$hostname_connection = "localhost";
$username_connection = "root";
$password_connection = "";
$database_connection = "nms";
$connection = mysql_connect($hostname_connection, $username_connection, $password_connection) or die(mysql_error());
mysql_select_db($database_connection, $connection);
?>