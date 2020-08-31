<?php
session_start();
try
{
  try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
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
$insertmbr3 = $bdd->prepare('DELETE from mdp where id=:delete');  
$insertmbr3->bindParam(':delete', $delete, PDO::PARAM_INT);
                     $insertmbr3->execute();
                     // inscrit pseudo,mail,droit dans table user
                     $insertmbr4= $bdd->prepare('DELETE from games where id=:delete');  
                     $insertmbr4->bindParam(':delete', $delete, PDO::PARAM_INT);                   
                     $insertmbr4->execute();
                     header("Location: admin.php");

                     

?>
