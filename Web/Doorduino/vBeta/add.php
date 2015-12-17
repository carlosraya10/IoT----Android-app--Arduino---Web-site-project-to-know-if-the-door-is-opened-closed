<?php
   	include("connect.php");
   	
   	$link=Connection();

	$temp1=$_POST["temp1"];

	$query = "INSERT INTO `PROXIMITY` (`mac`, `proximity`, `time`) 
		VALUES ('123','".$temp1."','16-12-2015 13:10:09')"; 
   	
   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");
?>
