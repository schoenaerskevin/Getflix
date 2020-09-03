<?php
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