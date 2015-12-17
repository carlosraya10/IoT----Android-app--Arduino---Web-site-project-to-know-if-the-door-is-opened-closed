<?php
require_once("sesion.class.php");
$sesion = new sesion();
$msg = "";

if( isset($_POST["btnOk"]) )
{
		
	$user = sha1($_POST["usuario"]);
	$nickname = $_POST["usuario"];
	$password = sha1($_POST["pass"]);
	
	if(checkUser($user,$password) == true)
	{			
		$sesion->set("user",$user);
		$sesion->setNick("nickname",$nickname);
		header("location: _homeApp.php");
	}
	else
	{
		$msg = "Incorrect user or password, please try again";
		$user = "";
	}

}



function checkUser($user, $password)
{
	include("connect.php"); 
	$link=Connection();
	$result = mysql_query("select pass from USERS where user = '$user';",$link);
	if($result!==FALSE)
	{
		$row = mysql_fetch_array($result); 
		if( strcmp($password,$row["pass"]) == 0)
			return true;
		else
			return false;
	}
	else
		return false;
}
?>