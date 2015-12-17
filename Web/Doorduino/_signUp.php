<?php
	//Puede ver la pagina pero si hay un usuario lo recupera
	require_once("php/login/sesion.class.php");
	$sesion = new sesion();
	$user = $sesion->get("user");
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>DD Sign Up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

	<!-- SCRIPTS PARA COMPROBACION DE CAMPOS DEL FORMULARIO -->
		<script type="text/javascript">
	//funcion para comprobar contrasenias
		    function checkPassword(){
	            password1 = document.frmSignUp.password1.value
	            password2 = document.frmSignUp.password2.value
	            if (password1 == password2){
	                return true;
	            }
	            else{
	                alert("Passwords do not match. Please retype.");
	                return false;        
	            }
	    	}
	//funcion para comprobar direcciones MAC
	 		function checkMAC(){
	 			mac1 = document.frmSignUp.mac1.value
	            mac2 = document.frmSignUp.mac2.value
	            if (mac1 == mac2){
	                return "true";
	            }
	            else{
	                alert("MAC addresses do not match. Please retype.");
	                return "false";
	            }
	    	}
	//funcion para comprobar que el password tiene al menos un numero una letra mayuscula, una minuscula y un caracter especial.
	    	function checkSTRONGpassword( password1 ) {
	    		var nMay = 0, nMin = 0, nNum = 0
				var t1 = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ"
				var t2 = "abcdefghijklmnñopqrstuvwxyz"
				var t3 = "0123456789"
				var t4 = "\_\-\.\,\@"
				if (password1.length > 7) {
					for (i=0;i<password1.length;i++) {
						if ( t1.indexOf(password1.charAt(i)) != -1 ) {nMay++}
						if ( t2.indexOf(password1.charAt(i)) != -1 ) {nMin++}
						if ( t3.indexOf(password1.charAt(i)) != -1 ) {nNum++}
						if ( t4.indexOf(password1.charAt(i)) != -1 ) {nSym++}
					}
					if ( nMay>0 && nMin>0 && nNum>0 && nSym>0 ) { return "true"; }
					else {
					alert("The password must be 8 characters including 1 uppercase letter, 1 lowercase letter, 1 special character, alphanumeric characters. ex: My_password3000");
					return "false"; }
				}else {
					alert("The password must be 8 characters including 1 uppercase letter, 1 lowercase letter, 1 special character, alphanumeric characters. ex: My_password3000");
					return "false"; }
			}
		</script>


	</head>
	<body>

		<!-- Header Menu -->
			<?php //include("_menu.php"); ?>





<!--************************************************************-->
		<!-- Main -->
		
		
			<div id="main">

				<!-- Sign up form -->
					<section id="connect" class="four">
						<div class="container">
						
							<div class="image fit">
									<img src="images/doorduino_logo_Black.png" alt="Doorduino" align="center"/>
							</div>

							<header>
								<h2>SIGN UP</h2>
							</header>

							<p>Please, fill the fields with your app information</p>

							<form name="frmSignUp" onsubmit="return checkPassword();" method="post" action="php/MySQL/addUs.php"  autocomplete="on">
								<div class="row">
									<div class="6u$ 12u$(mobile)"><input type="text" name="username" id="username" placeholder="User name" autofocus required/></div>
									<div class="6u 12u$(mobile)"><input type="password" name="password1" id="password1" placeholder="Password" onfocus="this.value = '';" onblur = "if (checkSTRONGpassword(this.value) == 'false'){this.value=''};" required/></div>
									<div class="6u$ 12u$(mobile)"><input type="password" name="password2" id="password2" placeholder="Confirm your password" required/></div>
									<div class="6u 12u$(mobile)"><input type="text" name="mac1" id="mac1" placeholder="your Arduino MAC ADDRESS" required/></div>
									<div class="6u 12u$(mobile)"><input type="text" name="mac2" id="mac2" placeholder="Confirm your Arduino MAC ADDRESS" onfocus="this.value = '';" onblur = "if (checkMAC()(this.value) == 'false'){this.value=''};" required/></div>
									<div class="12u$">
										<input type="submit" name="btnOk" id="btnOk" value="Sign up" />
									</div>
								</div>
							</form>
							<h4><a href="index.php#connect">I already have an account</a></h4>
							<p><a href="index.php#top"><strong>Go to HOME page</strong></a></p>
						</div>
					</section>

			</div>
			
		
		<!-- Footer -->
			<?php include("_footer.php"); ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>



