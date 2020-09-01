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
//requête du droit de l'user
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();

 //* requete +creation variable
//$req = $bdd->query('SELECT * FROM games ORDER BY nom DESC');
if(isset($_GET['genre']) AND !empty($_GET['genre'])) {
   $q = htmlspecialchars($_GET['genre']);
   $req = $bdd->query('SELECT * FROM games WHERE genre LIKE "%'.$q.'%" ORDER BY nom DESC');

}


?>
<?php 
include 'intro.php';
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
   <?php
   	  if ($droituser['droit']=="premium" || $droituser['droit']=="admin"){
                include 'chat.php';
      }
include 'outro.php';
?> 