<?php
   	include("connect.php");
   	
   	$link=Connection();

	$magnetic=$_POST["val"];
	$mac=sha1($_POST["mac"]);

//*****************************************************

date_default_timezone_set('Europe/Paris');
$time = time();
$current_date = date("Y-m-d H:i:s", $time); //2015-11-17 09:59:23


//*****************************************************

	$query = "INSERT INTO `MAGNETIC` (`mac`, `magnetic`, `time`) 
		VALUES ('".$mac."','".$magnetic."','".$current_date."')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");
?>