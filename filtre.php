<?php
include 'dbreq.php';
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
echo '<h1> '. ucfirst($_GET['genre']) .'</h1>';
?>
<div class="container-fluid">
<div class="row">
 <!-- renvoie la page dynamique en fonction de la recherche -->
<?php while($donnees = $req->fetch()) { ?>


        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 text-center">
<a href='jeu.php?id=<?php //add id to get the rigth jeu.php 
        echo htmlspecialchars($donnees['id']);
?>'>
<img class="m-2 border border-white rounded-lg" src="
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

</div>
        

   <?php } 
   ?>
   
   </div>
   </div>
   <?php
include 'outro.php';
?> 