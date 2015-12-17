<?php
   	include("../../connect.php");
   	
   	$link=Connection();

   	$user=sha1($_POST["username"]);
	$pass1=sha1($_POST["password1"]);

//********************Encryption Data*********************************
	//$mac = sha1("D8-FC-93-EC-C8-09"); 6e9cf85b994da2edfdcff9ab992af5e60a4c5dc0
	//$mac = sha1("A0-CE-39-FC-D2-03"); 35b3e5fa57c6307e3884ceda123d84ad7e1f4784
	//$user = sha1("carlosraya10");
	//$pass = sha1("Raya_2009");
//*****************************************************

	$query = "UPDATE USERS SET pass ='$pass1' WHERE user='$user';"; 
   	
   	if (mysql_query($query,$link) == TRUE){
   				mysql_close($link);
?>
				<!DOCTYPE HTML>
				<html>
				<head>
				<title>addUs</title>
					<script type="text/javascript">
					//Funcion para confirmar inserción
						alert("Password changed successfully!!");
					</script>
				
<?php
				
				header("refresh:1; url=../../_homeApp.php#about");
   	} else{
   		//Print MySQL errors
		echo "\n" . mysql_errno($link) . ": " . mysql_error($link). "\n";
		mysql_close($link);
		echo "<script type='text/javascript'>	alert('ERROR to update password');	</script>";
		header("refresh:1; url=../../_homeApp.php#about");
   	}

?>
</head>
<body>
</body>
</html>