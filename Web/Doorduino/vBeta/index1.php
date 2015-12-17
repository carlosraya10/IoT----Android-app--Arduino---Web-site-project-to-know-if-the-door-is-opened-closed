<?php

	include("connect.php"); 	
	
	$link=Connection();

	$result=mysql_query("SELECT * FROM `valTab` ORDER BY `time` DESC",$link);


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

   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;Time&nbsp;</td>
			<td>&nbsp;Proximity&nbsp;</td>
			<td>&nbsp;Magnetic&nbsp;</td>
			<td>&nbsp;Microphone&nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           date("d-m-Y H:i:s", strtotime($row["time"])), $row["proximity"], $row["magnetic"], $row["microphone"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table>
</body>
</html>
