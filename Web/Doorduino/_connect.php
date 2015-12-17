<?php
	//VEFIFIER SI L'UTILISATEUR EST LOGIN
	require_once("php/login/login.php");
?>
<!-- Contact -->
<section id="connect" class="four">
	<div class="container">

		<header>
			<h2>LOG IN</h2>
		</header>

		<p>Please, fill the fields with your app information</p>
		<p><?= $msg ?>
			<script type="text/javascript">
			  	if ("<?= $msg ?>" != ""){
			  		alert("<?= $msg ?>");
			  	}
			</script>
		</p>

		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<div class="row">
				<div class="6u 12u$(mobile)"><input type="text" name="usuario" placeholder="User" autofocus required/></div>
				<div class="6u$ 12u$(mobile)"><input type="password" name="pass" placeholder="Password" required/></div>
				<div class="12u$">
					<input type="submit" name="btnOk" id="btnOk" value="Log in" />
					<!--<p class="required">* Required fields</p>-->
				</div>
			</div>
		</form>

	</div>
</section>