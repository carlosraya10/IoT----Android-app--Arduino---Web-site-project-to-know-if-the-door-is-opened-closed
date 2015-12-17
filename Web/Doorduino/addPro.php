<?php
   	include("connect.php");
   	
   	$link=Connection();

	$proximity=$_POST["val"];
	$mac=sha1($_POST["mac"]);

//*****************************************************

date_default_timezone_set('Europe/Paris');
$time = time();
$current_date = date("Y-m-d H:i:s", $time); //2015-11-17 09:59:23


//*****************************************************
echo "\n prox=" . $_POST["val"] . ": mac" . $mac. "\n";

	$query = "INSERT INTO `PROXIMITY` (`mac`, `proximity`, `time`) 
		VALUES ('".$mac."','".$proximity."','".$current_date."')"; 
   	
   	mysql_query($query,$link);
//Print MySQL errors
echo "\n" . mysql_errno($link) . ": " . mysql_error($link). "\n";
	mysql_close($link);

   	//header("Location: index.php");
?>