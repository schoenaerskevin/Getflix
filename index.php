<?php 
	
	session_start();

	$id_session = session_id();

	echo $_COOKIE["PHPSESSID"];


 ?>
 
 <!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
 	<title>STREAMLER.COM</title>
 </head>
 <body>
   <?php 
    	include 'menu.php';
 		include 'home.php';
 	 ?>
 </body>
 </html>

