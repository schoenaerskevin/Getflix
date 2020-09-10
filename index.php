<?php 
	
	include 'dbreq.php';

//requête du droit de l'user
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();
?>

<?php

    include 'connexion.php';

?>    

