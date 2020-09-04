<?php
include 'dbreq.php';
//* delete user
$delete = $_GET["id"];

                     // inscrit pseudo,mail,droit dans table user
                     $deluse1= $bdd->prepare('DELETE from user where id=:delete');  
                     $deluse1->bindParam(':delete', $delete, PDO::PARAM_INT);                   
                     $deluse1->execute();
                     header("Location: admin.php");



?>
