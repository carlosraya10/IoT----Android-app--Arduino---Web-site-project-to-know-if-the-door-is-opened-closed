<?php
require_once("../login/sesion.class.php");
	$sesion = new sesion();
	$user = $sesion->get("user");
	$nickname = $sesion->getNick("nickname");
	if( $user == false )
	{
		header("Location: ../../index.php");
	}else{


			   	include("../../connect.php");
			   	
			   	$link=Connection();

			   	

				$query = "DELETE FROM PROXIMITY WHERE PROXIMITY.mac IN (SELECT USERS.mac FROM USERS WHERE user='$user');";
				if (mysql_query($query,$link) == TRUE){
					$query = "DELETE FROM MAGNETIC WHERE MAGNETIC.mac IN (SELECT USERS.mac FROM USERS WHERE user='$user');";
					if (mysql_query($query,$link) == TRUE){
						$query = "DELETE FROM MICROPHONE WHERE MICROPHONE.mac IN (SELECT USERS.mac FROM USERS WHERE user='$user');";
							if (mysql_query($query,$link) == TRUE){
			   				mysql_close($link);
				?>
								<!DOCTYPE HTML>
								<html>
								<head>
								<title>addUs</title>
									<script type="text/javascript">
									//Funcion para confirmar inserción
										alert("ALL DATA WAS DELETED!!");
									</script>
								
				<?php
								
								header("refresh:1; url=../../_homeApp.php#history");
						   	} else{
						   		//Print MySQL errors
								echo "\n" . mysql_errno($link) . ": " . mysql_error($link). "\n";
								mysql_close($link);
								echo "<script type='text/javascript'>	alert('ERROR to delete data');	</script>";
								header("refresh:1; url=../../_homeApp.php#history");
						   	}
					}
				}else{
			   		//Print MySQL errors
					echo "\n" . mysql_errno($link) . ": " . mysql_error($link). "\n";
					mysql_close($link);
					echo "<script type='text/javascript'>	alert('ERROR to delete data');	</script>";
					header("refresh:1; url=../../_homeApp.php#history");
			   	}
			?>
			</head>
			<body>
			</body>
			</html>
<?php
		}
?>