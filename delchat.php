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

                     // inscrit pseudo,mail,droit dans table user
                     $insertmbr15= $bdd->prepare('DELETE from chat where id=:delete');  
                     $insertmbr15->bindParam(':delete', $delete, PDO::PARAM_INT);                   
                     $insertmbr15->execute();
                     header("Location: admin.php");



?>
