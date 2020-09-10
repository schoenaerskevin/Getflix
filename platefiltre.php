<?php
include 'dbreq.php';

//requête du droit de l'user
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();

 //* requete +creation variable
//$req = $bdd->query('SELECT * FROM games ORDER BY nom DESC');
if(isset($_GET['plateforme']) AND !empty($_GET['plateforme'])) {
   $q = htmlspecialchars($_GET['plateforme']);
   $req = $bdd->query('SELECT * FROM games WHERE plateforme LIKE "%'.$q.'%" ORDER BY nom DESC');

}



   include 'intro.php';
        include 'menu.php';

 	 ?>
          <div class="container-fluid">
<div class="row">
 <!-- renvoie la page dynamique en fonction de la recherche -->
<?php while($donnees = $req->fetch()) { ?>
      
      <a href='jeu.php?id=<?php //add id to get the rigth jeu.php 
        echo htmlspecialchars($donnees['id']);
?>'>
<img class= "m-2 border border-white rounded-lg" src="
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
        
   <?php } 
?>
</div>
</div>
<?php
   include 'outro.php';?>