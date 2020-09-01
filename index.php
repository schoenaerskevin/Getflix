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

//requête du droit de l'user
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();

	include 'intro.php';
    	include 'menu.php';
	  include 'home.php';
	  if ($droituser['droit']=="premium" || $droituser['droit']=="admin"){
		  include 'chat.php';
	}
	include 'outro.php';
	  ?>    
