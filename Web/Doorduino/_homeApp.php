<?php
	//VEFIFIER SI L'UTILISATEUR EST LOGIN
	require_once("php/login/sesion.class.php");
	$sesion = new sesion();
	$user = $sesion->get("user");
	$nickname = $sesion->getNick("nickname");
	if( $user == false )
	{
		header("Location: index.php");
	}
	else 
	{//else (SY ESTA LOGUEADO)



	include("connect.php"); 	
	
	$link=Connection();
    //$resultUs=mysql_query("SELECT * FROM `USERS` WHERE user = '".$user."'",$link);
    //					 	SELECT * FROM `SENSOR` where mac=".$currentUserMac." ORDER BY `time` DESC
    //$resultPass=mysql_query("SELECT pass FROM `USERS` WHERE user = '".$user."'",$link);
	$resultPro=mysql_query("SELECT PROXIMITY.* FROM PROXIMITY, USERS WHERE PROXIMITY.mac = USERS.mac AND USERS.user='".$user."' ORDER BY `time` DESC",$link);
	$resultMag=mysql_query("SELECT MAGNETIC.* FROM MAGNETIC, USERS WHERE MAGNETIC.mac = USERS.mac AND USERS.user='".$user."' ORDER BY `time` DESC",$link);
	$resultMic=mysql_query("SELECT MICROPHONE.* FROM MICROPHONE, USERS WHERE MICROPHONE.mac = USERS.mac AND USERS.user='".$user."' ORDER BY `time` DESC",$link);
	$resultPro2=mysql_query("SELECT PROXIMITY.* FROM PROXIMITY, USERS WHERE PROXIMITY.mac = USERS.mac AND USERS.user='".$user."' ORDER BY `time` DESC",$link);
	$resultMag2=mysql_query("SELECT MAGNETIC.* FROM MAGNETIC, USERS WHERE MAGNETIC.mac = USERS.mac AND USERS.user='".$user."' ORDER BY `time` DESC",$link);
	$resultMic2=mysql_query("SELECT MICROPHONE.* FROM MICROPHONE, USERS WHERE MICROPHONE.mac = USERS.mac AND USERS.user='".$user."' ORDER BY `time` DESC",$link);
	


/********************* CAMBIAR FORMATO DE FECHA DE yyyy-mm-dd a dd-mm-yyyy *********************

$time = time();
$originalDate  = date("Y-m-d H:i:s", $time); //2015-11-17 09:54:26
$newDate = date("d-m-Y H:i:s", strtotime($originalDate)); //17-11-2015 09:54:26 

*/
?>

<!DOCTYPE HTML>
<html>
   <head>
    	<title>DD Home</title>
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
	//funcion para comprobar password anterior
	 		/*function checkOLDpassword(){
	 			var truePass = "<?php	if($resultPass!==FALSE){   $row = mysql_fetch_array($resultPass);    printf( $row['pass']);	    mysql_free_result($resultPass);	} ?>";
				oldPass = document.frmSignUp.oldpass.value

				var oldPassEncrypted = "<?= sha1('"+oldPass+"'); ?>";
				alert(truePass+"\n"+oldPassEncrypted+"\n"+oldPass);

	            if (truePass == oldPassEncrypted){
	                return "true";
	            }
	            else{
	                alert("Your current password is incorrect. Please try again.");
	                <?php //header("refresh:1; url=_homeApp.php#about"); ?>
	                return "false";
	            }
	    	}*/
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
		//Funcion para confirmar el borrado de cuenta
          function confirmar()
	          {
	            respuesta = confirm("Are you sure to dele all hitory data?");
	            if (respuesta){
	              // si pulsamos en aceptar
	              //alert('Has dicho que si');
	              document.location.href="php/MySQL/deleteAllSensorsData.php";
	            }
	            
	            else{
	              // si pulsamos en cancelar
	              //alert('Has dicho que no');
	              document.location.href="_homeApp.php#history";
	            }
	          }
		</script>
   </head>
<body>
	<!-- Google Analytics -->
		<?php include_once("analyticstracking.php") ?>
	
	<!-- Header Menu -->
			<?php include("_menu.php"); ?>

	<!-- Main -->
		<div id="main">


		<!-- sensors - Last data -->
			<section id="sensors" class="three">
				<div class="container">

					<header>
						<h2>Last data registered from Doorduino</h2>
					</header>
					


				    <br><br/>
				    <h3>Proximity sensor</h3>
				    <table border="1" cellspacing="1" cellpadding="1">
						<tr>
							<td>&nbsp;STATE&nbsp;</td>
							<td>&nbsp;TIME / HOUR&nbsp;</td>
							<td>&nbsp;PROXIMITY&nbsp;</td>
						</tr>

				      <?php 
				      		if($resultPro!==FALSE){
							    if($row = mysql_fetch_array($resultPro)){
							     	if ($row["proximity"] > 400){ $val="Door OPENED <div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/openedDoor.png' alt='Doorduino' align='center'/>	</div> </article> </div>";}
							     	else {$val="Door CLOSED <div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/closedDoor.png' alt='Doorduino' align='center'/>	</div> </article> </div>";}
							        echo "<tr>";
							        echo "<td> &nbsp;".$val." </td>";
							        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
							        echo "<td> &nbsp;".$row["proximity"]."&nbsp;</td>";
							        echo "</tr>";
							    }
							     mysql_free_result($resultPro);
							  }
						  /* OTRA MANERA DE MOSTRAR EN GRANDE LA IMAGEN
						  if($resultPro!==FALSE){
						     $row = mysql_fetch_array($resultPro);
						     	if ($row["proximity"] > 400){ $val="Door OPENED";}
						     	else {$val="Door CLOSED";}
						        echo "<tr>";
						        echo "<td> &nbsp;".$val." </td>";
						        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
						        echo "<td> &nbsp;".$row["proximity"]."&nbsp;</td>";
						        echo "</tr>";

										$val = $row["proximity"];
										if ($val > 400){
								    		echo "<div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/openedDoor.png' alt='Doorduino' align='center'/>	</div> </article> </div>";
								    	} else {
								    		echo "<div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/closedDoor.png' alt='Doorduino' align='center'/>	</div> </article> </div>";
								    	}
						     mysql_free_result($resultPro);
						  }*/
				      ?>
				    </table>


				    <br><br/>
				    <h3>Magnetic sensor</h3>
				    <table border="1" cellspacing="1" cellpadding="1">
						<tr>
							<td>&nbsp;STATE&nbsp;</td>
							<td>&nbsp;TIME / HOUR&nbsp;</td>
							<td>&nbsp;MAGNETIC&nbsp;</td>
						</tr>

				      <?php
				      		if($resultMag!==FALSE){
							    if($row = mysql_fetch_array($resultMag)){
							     	if ($row["magnetic"] == 694 or $row["magnetic"] == 695){ $val="Lock LOCKED <div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/closedLock.png' alt='Doorduino' align='center'/>	</div> </article> </div>";}
							     	else {$val="Lock OPENED <div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/openedLock.png' alt='Doorduino' align='center'/>	</div> </article> </div>";}
							        echo "<tr>";
							        echo "<td> &nbsp;".$val." </td>";
							        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
							        echo "<td> &nbsp;".$row["magnetic"]."&nbsp;</td>";
							        echo "</tr>";
							    }
							     mysql_free_result($resultMag);
						  	}
				      	/* OTRA MANERA DE MOSTRAR EN GRANDE LA IMAGEN
						  if($resultMag!==FALSE){
						     $row = mysql_fetch_array($resultMag);
						     	if ($row["magnetic"] == 694 or $row["magnetic"] == 695){ $val="Lock LOCKED";}
						     	else {$val="Lock OPENED";}
						        echo "<tr>";
						        echo "<td> &nbsp;".$val." </td>";
						        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
						        echo "<td> &nbsp;".$row["magnetic"]."&nbsp;</td>";
						        echo "</tr>";

										$val = $row["magnetic"];
										if ($val == 694 or $val == 695){
								    		echo "<div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/closedLock.png' alt='Doorduino' align='center'/>	</div> </article> </div>";
								    	} else {
								    		echo "<div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/openedLock.png' alt='Doorduino' align='center'/>	</div> </article> </div>";
								    	}
						     mysql_free_result($resultMag);
						  }*/
				      ?>
				    </table>


				    <br><br/>
				    <h3>Microphone sensor</h3>
				    <table border="1" cellspacing="1" cellpadding="1">
						<tr>
							<td>&nbsp;STATE&nbsp;</td>
							<td>&nbsp;TIME / HOUR&nbsp;</td>
							<td>&nbsp;MICROPHONE&nbsp;</td>
						</tr>

				      <?php
				      		if($resultMic!==FALSE){
							    if($row = mysql_fetch_array($resultMic)){
							     	$val="Knock Knock!! <div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/knock.png' alt='Doorduino' align='center'/>	</div> </article> </div>";
							        echo "<tr>";
							        echo "<td> &nbsp;".$val." </td>";
							        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
							        echo "<td> &nbsp;".$row["microphone"]."&nbsp;</td>";
							        echo "</tr>";
							    }
							     mysql_free_result($resultMic);
							}
				      	/* OTRA MANERA DE MOSTRAR EN GRANDE LA IMAGEN
						  if($resultMic!==FALSE){
						     $row = mysql_fetch_array($resultMic);
						     	$val="Knock Knock!!";
						        echo "<tr>";
						        echo "<td> &nbsp;".$val." </td>";
						        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
						        echo "<td> &nbsp;".$row["microphone"]."&nbsp;</td>";
						        echo "</tr>";
								    		echo "<div class='4u 12u$(mobile)'> <article class='item'> <div class='image fit'>	<img src='images/knock.png' alt='Doorduino' align='center'/>	</div> </article> </div>";
						     mysql_free_result($resultMic);
						  }*/
				      ?>
				    </table>
				</div>
			</section>


		<!-- History -->
			<section id="history" class="three">
				<div class="container">

					<header>
						<h2>History Doorduino activity</h2>
						<a href="javascript:confirmar();" id="history-link" class="skel-layers-ignoreHref"><span class="icon fa-eraser">Clear history data</span></a>
					</header>

				    <br><br/>
				    <h3>Proximity sensor</h3>
				    <table border="1" cellspacing="1" cellpadding="1">
						<tr>
							<td>&nbsp;PROXIMITY&nbsp;</td>
							<td>&nbsp;TIME / HOUR&nbsp;</td>
							<td>&nbsp;MAC&nbsp;</td>
						</tr>

				      <?php 
						  if($resultPro2!==FALSE){
						    while($row = mysql_fetch_array($resultPro2)){
						     	if ($row["proximity"] > 400){ $val="Door OPENED";}
						     	else {$val="Door CLOSED";}
						        echo "<tr>";
						        echo "<td> &nbsp;".$val." </td>";
						        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
						        echo "<td> &nbsp;".$row["proximity"]."&nbsp;</td>";
						        echo "</tr>";
							}
						     mysql_free_result($resultPro2);
						  }
				      ?>
				    </table>


				    <br><br/>
				    <h3>Magnetic sensor</h3>
				    <table border="1" cellspacing="1" cellpadding="1">
						<tr>
							<td>&nbsp;STATE&nbsp;</td>
							<td>&nbsp;TIME / HOUR&nbsp;</td>
							<td>&nbsp;MAGNETIC&nbsp;</td>
						</tr>

				      <?php 
						  if($resultMag2!==FALSE){
						    while($row = mysql_fetch_array($resultMag2)){
						     	if ($row["magnetic"] == 694 or $row["magnetic"] == 695){ $val="Lock LOCKED";}
						     	else {$val="Lock OPENED";}
						        echo "<tr>";
						        echo "<td> &nbsp;".$val." </td>";
						        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
						        echo "<td> &nbsp;".$row["magnetic"]."&nbsp;</td>";
						        echo "</tr>";
						    }
						     mysql_free_result($resultMag2);
						  }
				      ?>
				    </table>


				    <br><br/>
				    <h3>Microphone sensor</h3>
				    <table border="1" cellspacing="1" cellpadding="1">
						<tr>
							<td>&nbsp;STATE&nbsp;</td>
							<td>&nbsp;TIME / HOUR&nbsp;</td>
							<td>&nbsp;MICROPHONE&nbsp;</td>
						</tr>

				      <?php 
						  if($resultMic2!==FALSE){
						    while($row = mysql_fetch_array($resultMic2)){
						     	$val="Knock Knock!!";
						        echo "<tr>";
						        echo "<td> &nbsp;".$val." </td>";
						        echo "<td> &nbsp;".date('d-m-Y H:i:s',strtotime($row['time']))."&nbsp;</td>";
						        echo "<td> &nbsp;".$row["microphone"]."&nbsp;</td>";
						        echo "</tr>";
						    }
						     mysql_free_result($resultMic2);
						  }
				      ?>
				    </table>
				</div>
			</section>

		<!-- about -->
			<section id="about" class="four">
						<div class="container">
						
							<div class="image fit">
									<img src="images/doorduino_logo_Black.png" alt="Doorduino" align="center"/>
							</div>

							<header>
								<p>logged in like</p> <h2><?= $nickname ?></h2>
							</header>

							<p><h2>Change password</h2></p>

							<form name="frmSignUp" onsubmit="return checkPassword();" method="post" action="php/MySQL/updateUs.php"  autocomplete="on">
								<div class="row">
									<div class="6u$ 12u$(mobile)"><input type="text" name="username" id="username" value="<?= $nickname ?>" onblur ="this.value='<?= $nickname ?>'" /></div>
									<!-- <div class="6u$ 12u$(mobile)"><input type="password" name="oldpass" id="oldpass" placeholder="MY CURRENT PASSWORD" onfocus="this.value = '';" onblur = "if (checkOLDpassword(this.value) == 'false'){this.value=''};" required/></div> -->
									<div class="6u 12u$(mobile)"><input type="password" name="password1" id="password1" placeholder="New password" onfocus="this.value = '';" onblur = "if (checkSTRONGpassword(this.value) == 'false'){this.value=''};" required/></div>
									<div class="6u$ 12u$(mobile)"><input type="password" name="password2" id="password2" placeholder="Confirm new password" required/></div>
									<div class="12u$">
										<input type="submit" name="btnOk" id="btnOk" value="Update" />
									</div>
								</div>
							</form>
							<p><a href="_homeApp.php#sensors"><strong>Cancel</strong></a></p>
						</div>

						<p align="center">
							<a href="php/login/fermerSession.php" id="logout-link" class="skel-layers-ignoreHref"><span class="icon fa-sign-out">Log out</span></a>
						</p>
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

<?php 
	}//else (SY ESTA LOGUEADO)
?>