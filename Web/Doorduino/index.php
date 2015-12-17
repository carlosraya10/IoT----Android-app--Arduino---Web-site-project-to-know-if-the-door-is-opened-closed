<?php
	//Puede ver la pagina pero si hay un usuario lo recupera
	require_once("php/login/sesion.class.php");
	$sesion = new sesion();
	$user = $sesion->get("user");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Doorduino</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header Menu -->
			<?php //include("_menu.php"); ?>





<!--************************************************************-->
		<!-- Main -->
		
		
			<div id="main">

				<!-- Intro -->
					<?php include("_intro.php"); ?>

				<!-- Portfolio -->
					<?php //include("_portfolio.php"); ?>

				<!-- About Me -->
					<?php //include("_aboutMe.php"); ?>

				<!-- Contact -->
					<?php include("_connect.php"); ?>

			</div>
			
		
		<!-- Footer -->
			<?php include("_footer.php"); ?>

	</body>
</html>