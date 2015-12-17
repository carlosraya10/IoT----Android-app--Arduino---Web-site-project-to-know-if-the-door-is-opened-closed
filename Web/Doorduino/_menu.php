<?php
	require_once("php/login/sesion.class.php");
	$sesion = new sesion();
	//$user = $sesion->get("user");
	$nickname = $sesion->getNick("nickname");
	if( $user == false ) //S'il n'y a pas une session active, alors déconnecter pour que personne ne puisse pas regarder le code écrit ici
	{	
		header("Location: index.php");
    }
	else 
	{ //Si l'utilisateur il existe, alors fermer la session
?>



<!-- Header Menu -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
							<h1 id="title"><?= $nickname ?></h1>
							<p>Doorduino profile</p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#sensors" id="sensors-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Last data</span></a></li>
								<li><a href="#history" id="history-link" class="skel-layers-ignoreHref"><span class="icon fa-th">History</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">About Me</span></a></li>
								<!-- <li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Report a problem</span></a></li> -->
								<li><a href="php/login/fermerSession.php" id="logout-link" class="skel-layers-ignoreHref"><span class="icon fa-sign-out">Log out</span></a></li>
							</ul>
						</nav>
				</div>

				<div class="bottom">
					<!-- Social Icons -->
						<?php //include("_socialIcons.php"); ?>

					<div class="image fit">
						<img src="images/doorduino_logo_White.png" alt="Doorduino" align="center"/>
					</div>
				</div>

			</div>

<?php
	}
?>