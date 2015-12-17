<?php
   	include("connect.php");
   	
   	$link=Connection();

	$mac=$_POST["mac"];
	$user=sha1($_POST["user"]);
	$pass=sha1($_POST["pass"]);

//********************Encryption Data*********************************


	//$mac = "D8-FC-93-EC-C8-09";
	//$user = sha1("carlosraya10");
	//$pass = sha1("Raya_2009");



//*****************************************************

	$query = "INSERT INTO `USERS` (`user`, `pass`, `mac`) 
		VALUES ('".$user."','".$pass."','".$mac."')"; 
   	
   	mysql_query($query,$link);

	//Print MySQL errors
	echo "\n" . mysql_errno($link) . ": " . mysql_error($link). "\n";

	mysql_close($link);

   	header("Location: index.php");
?>