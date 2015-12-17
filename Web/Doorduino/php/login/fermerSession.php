<?php
	require_once("sesion.class.php");
	
	$sesion = new sesion();
	$user = $sesion->get("user");
	$nickname = $sesion->getNick("nickname");
	if( $user == false ) //S'il n'y a pas une session active, alors déconnecter pour que personne ne puisse pas regarder le code écrit ici
	{	
		?><script languaje="javascript">
      		alert( "Log out" );
      		location.href = "../../index.php";
      	</script><?php
    }
	else 
	{ //Si l'utilisateur il existe, alors fermer la session
		$sesion->delete_variable($user);
		$sesion->delete_variableNick($nickname);
		$sesion->end_sesion();
		?><script languaje="javascript">
      		alert( "Log out" );
      		location.href = "../../index.php";
      	</script><?php
	}
?>