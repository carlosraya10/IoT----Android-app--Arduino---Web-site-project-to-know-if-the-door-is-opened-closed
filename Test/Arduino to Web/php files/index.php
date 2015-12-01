<?php

	include("connect.php"); 	
	
	$link=Connection();

	$resultPro=mysql_query("SELECT * FROM `PROXIMITY` ORDER BY `time` DESC",$link);
	$resultMag=mysql_query("SELECT * FROM `MAGNETIC` ORDER BY `time` DESC",$link);
	$resultMic=mysql_query("SELECT * FROM `MICROPHONE` ORDER BY `time` DESC",$link);
	//					 SELECT * FROM `PROXIMITY` where mac=".$currentUserMac." ORDER BY `time` DESC


/********************* CAMBIAR FORMATO DE FECHA DE yyyy-mm-dd a dd-mm-yyyy *********************

$time = time();
$originalDate  = date("Y-m-d H:i:s", $time); //2015-11-17 09:54:26
$newDate = date("d-m-Y H:i:s", strtotime($originalDate)); //17-11-2015 09:54:26 

*/
?>

<html>
   <head>
      <title>Sensor Data</title>
   </head>
<body>
   <h1>Proximity/ Magnetic / Microphone sensor readings</h1>

   <br><br/>
   <h3>Proximity sensor</h3>
   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;PROXIMITY&nbsp;</td>
			<td>&nbsp;TIME&nbsp;</td>
			<td>&nbsp;MAC&nbsp;</td>
		</tr>

      <?php 
		  if($resultPro!==FALSE){
		     while($row = mysql_fetch_array($resultPro)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["proximity"], date("d-m-Y H:i:s", strtotime($row["time"])), $row["mac"]);
		     }
		     mysql_free_result($resultPro);
		  }
      ?>
   </table>


   <br><br/>
   <h3>Magnetic sensor</h3>
   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;MAGNETIC&nbsp;</td>
			<td>&nbsp;TIME&nbsp;</td>
			<td>&nbsp;MAC&nbsp;</td>
		</tr>

      <?php 
		  if($resultMag!==FALSE){
		     while($row = mysql_fetch_array($resultMag)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["magnetic"], date("d-m-Y H:i:s", strtotime($row["time"])), $row["mac"]);
		     }
		     mysql_free_result($resultMag);
		  }
      ?>
   </table>


   <br><br/>
   <h3>Microphone sensor</h3>
   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;MICROPHONE&nbsp;</td>
			<td>&nbsp;TIME&nbsp;</td>
			<td>&nbsp;MAC&nbsp;</td>
		</tr>

      <?php 
		  if($resultMic!==FALSE){
		     while($row = mysql_fetch_array($resultMic)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["microphone"], date("d-m-Y H:i:s", strtotime($row["time"])), $row["mac"]);
		     }
		     mysql_free_result($resultMic);
		     mysql_close();
		  }
      ?>
   </table>


</body>
</html>
