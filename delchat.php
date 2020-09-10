<?php
include 'dbreq.php';
//* delete user
$delete = $_GET["id"];

                     // inscrit pseudo,mail,droit dans table user
                     $insertmbr15= $bdd->prepare('DELETE from comment where id=:delete');  
                     $insertmbr15->bindParam(':delete', $delete, PDO::PARAM_INT);                   
                     $insertmbr15->execute();
                     header("Location: admin.php");



?>
