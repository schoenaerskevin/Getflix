<?php
include 'dbreq.php';
//* delete user
$delete = $_GET["id"];
$insertmbr3 = $bdd->prepare('DELETE from mdp where id=:delete');  
$insertmbr3->bindParam(':delete', $delete, PDO::PARAM_INT);
                     $insertmbr3->execute();
                     // inscrit pseudo,mail,droit dans table user
                     $insertmbr4= $bdd->prepare('DELETE from user where id=:delete');  
                     $insertmbr4->bindParam(':delete', $delete, PDO::PARAM_INT);                   
                     $insertmbr4->execute();
                     header("Location: admin.php");



?>
