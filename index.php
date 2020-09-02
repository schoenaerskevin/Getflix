<?php 
	
	include 'dbreq.php';

//requête du droit de l'user
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();

	include 'intro.php';
    	include 'menu.php';
	  include 'home.php';
	include 'outro.php';
	  ?>    
