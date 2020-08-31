<?php 
	
	session_start();

	$id_session = session_id();

	
// * done by Seb
// Connect to database
try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

$req = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$req->execute(array($_SESSION['pseudo']));
$donnees = $req-> fetch();

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
	  if ($donnees['droit']=="premium" || $donnees['droit']=="admin"){
      	include 'chat.php';
	}
 	 ?>
 </body>
 </html>

