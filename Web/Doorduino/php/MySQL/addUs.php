<?php
   	include("../../connect.php");
   	
   	$link=Connection();

	$mac=sha1($_POST["mac2"]);
	$user=sha1($_POST["username"]);
	$pass=sha1($_POST["password2"]);

//********************Encryption Data*********************************
	//$mac = sha1("D8-FC-93-EC-C8-09"); 6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0
	//$mac = sha1("A0-CE-39-FC-D2-03"); 35b3e5fa57c6307e3884ceda123d84ad7e1f4784
	//$user = sha1("carlosraya10");
	//$pass = sha1("Raya_2009");
//*****************************************************

	$query = "INSERT INTO `USERS` (`user`, `pass`, `mac`) 
		VALUES ('".$user."','".$pass."','".$mac."')"; 
   	
   	if (mysql_query($query,$link) == TRUE){
   				mysql_close($link);
?>
				<!DOCTYPE HTML>
				<html>
				<head>
				<title>addUs</title>
					<script type="text/javascript">
					//Funcion para confirmar inserción
						alert("SIGN UP SUCCESSFUL!! Please log in");
					</script>
				
<?php
				
				header("refresh:1; url=../../index.php#connect");
   	} else{
   		//Print MySQL errors
		echo "\n" . mysql_errno($link) . ": " . mysql_error($link). "\n";
		mysql_close($link);
		echo "<script type='text/javascript'>	alert('ERROR!! The username or MAC address already exist. Please try again');	</script>";
		header("refresh:1; url=../../index.php#connect");
   	}

?>
</head>
<body>
</body>
</html>