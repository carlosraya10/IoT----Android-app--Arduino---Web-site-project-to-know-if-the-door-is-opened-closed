<?php
   	include("connect.php");
   	
   	$link=Connection();

	$proximity=$_POST["proVal"];
	$magnetic=$_POST["magVal"];
	$microphone=$_POST["micVal"];

//*****************************************************

$time = time();
$current_date = date("Y-m-d H:i:s", $time); //2015-11-17 09:59:23


//*****************************************************

	$query = "INSERT INTO `valTab` (`time`, `proximity`, `magnetic`, `microphone`) 
		VALUES ('".$current_date."','".$proVal."','".$magVal."','".$micVal."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");
?>