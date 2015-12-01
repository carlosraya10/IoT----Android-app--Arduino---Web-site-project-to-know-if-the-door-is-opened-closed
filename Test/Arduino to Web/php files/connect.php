<?php

	function Connection(){
		$server="mysql13.000webhost.com";
		$user="a5367352_root";
		$pass="android10";
		$db="a5367352_db";
	   	
		$connection = mysql_connect($server, $user, $pass);

		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
		
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

		return $connection;
	}
?>
