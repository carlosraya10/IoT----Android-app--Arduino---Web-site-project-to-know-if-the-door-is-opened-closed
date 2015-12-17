<?php
	//VEFIFIER SI L'UTILISATEUR EST LOGIN
	require_once("sesion.class.php");
	$sesion = new sesion();
	$user = $sesion->get("user");
	if( $user == false )
	{
		header("Location: ../../_connect.php");
	}
	else 
	{
	?>

	<!DOCTYPE html>
	<html lang = "fr">
		<head>
			<meta charset = "UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale=1" />
			<link rel="stylesheet" href="assets/css/main.css" />
			<title>Hi, <?= $user; ?></title>
		</head>
		<body style="background-color:#E3F6CE">
			<section id="frmSection">
				<fieldset>
					<legend id="mainLegend"><h1>You are log in</h1></legend>
					<p>Welcome <?= $user; ?>, you are log in in the Doorduino app.</p>
					<a href="fermerSession.php"> Log out </a>
				</fieldset>
			</section>
		</body>
	</html>
	<?php 
	}//else (SY ESTA LOGUEADO)
?>