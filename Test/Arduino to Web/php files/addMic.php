<?php
   	include("connect.php");
   	
   	$link=Connection();

	$microphone=$_POST["val"];
	$mac=$_POST["mac"];

//*****************************************************

$time = time();
$current_date = date("Y-m-d H:i:s", $time); //2015-11-17 09:59:23


//*****************************************************

	$query = "INSERT INTO `MICROPHONE` (`mac`, `microphone`, `time`) 
		VALUES ('".$mac."','".$microphone."','".$current_date."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");
?>