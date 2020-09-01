<?php
 session_start();
 //* connection base de donnée
 try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

 //* requete +creation variable
//$req = $bdd->query('SELECT * FROM games ORDER BY nom DESC');
if(isset($_GET['genre']) AND !empty($_GET['genre'])) {
   $q = htmlspecialchars($_GET['genre']);
   $req = $bdd->query('SELECT * FROM games WHERE genre LIKE "%'.$q.'%" ORDER BY nom DESC');

}


?>
<!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="UTF-8">
 	<title>STREAMLER.COM</title>
 </head>
 <body>
   <?php 
        include 'menu.php';

 	 ?>
 <!-- renvoie la page dynamique en fonction de la recherche -->
<?php while($donnees = $req->fetch()) { ?>
      
      <a href='jeu.php?id=
<?php //add id to get the rigth jeu.php 
        echo htmlspecialchars($donnees['id']);
?>'>
<img src="
        <?php
                //img from db
                echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $donnees['cover'] )); 
        ?>
        " alt="
        <?php
                //nom from db
                echo htmlspecialchars($donnees['nom']); 
        ?>
        "></a>
        
   <?php } ?>

   </body>
 </html>