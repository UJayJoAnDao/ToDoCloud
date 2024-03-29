<?php
$db_access="root";
$db_password="danny125835678";
//header("Content-Type:text/html; charset=utf-8");
$conn = mysqli_connect("localhost",$db_access,$db_password)or die("無法連接");
//echo("連接成功");
mysqli_query($conn,"SET CHARACTER SET utf8");
mysqli_query($conn,"SET NAMES 'utf8'");
?>
