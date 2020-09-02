<?php
session_start();
try
{
  try
{
	$bdd = new PDO('mysql:host=localhost;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
  //$bdd = new PDO('mysql:host=127.0.0.1;dbname=Streamler;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
//* delete user
$delete = $_GET["id"];
$insertmbr7 = $bdd->prepare('DELETE from mdp where id=:delete');  
$insertmbr7->bindParam(':delete', $delete, PDO::PARAM_INT);
                     $insertmbr7->execute();
                     // inscrit pseudo,mail,droit dans table user
                     $insertmbr8= $bdd->prepare('DELETE from user where id=:delete');  
                     $insertmbr8->bindParam(':delete', $delete, PDO::PARAM_INT);                   
                     $insertmbr8->execute();

                     $_SESSION = array();
session_destroy();
header("Location: index.php");
                     



?>