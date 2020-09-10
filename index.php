<?php 
	include 'dbreq.php';
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();
?>
<?php
    include 'connexion.php';
?>    

