<?php
include 'dbreq.php';
//* delete user
$delete = $_GET["id"];

                     // inscrit pseudo,mail,droit dans table user
                     $delgame1= $bdd->prepare('DELETE from games where id=:delete');  
                     $delgame1->bindParam(':delete', $delete, PDO::PARAM_INT);                   
                     $delgame1->execute();
                     header("Location: admin.php");



?>
