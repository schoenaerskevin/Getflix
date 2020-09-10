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

 	
        switch ($_GET['plateforme']) {
                case ($_GET['plateforme'] == "PS4"):
                    echo '<img src="assets/img/playstation.png" alt="playstation" height="100px"border="0">';
                break;
            
                case ($_GET['plateforme'] == "Xbox"):
                    echo '<img src="assets/img/xbox.png" alt="xbox" width="200px"border="0">';
                break;
            
                case ($_GET['plateforme'] == "Switch"):
                    echo '<img src="assets/img/nintendo.png" alt="nintendo" height="100px"border="0">';
                break;
            
                case ($_GET['plateforme'] == "PC"):
                    echo '<img src="assets/img/windows.png" alt="windows" width="200px"border="0">';
                break;
                    
                case ($_GET['plateforme'] == "Mac"):
                    echo '<img src="assets/img/maclogo.png" alt="mac" height="100px"border="0">';
                break;
                default :
                        echo "Error";
                
            }
 ?>
          <div class="container-fluid">
<div class="row">
 <!-- renvoie la page dynamique en fonction de la recherche -->
<?php while($donnees = $req->fetch()) { ?>
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 text-center">
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
        </div>
        
   <?php } 
?>
</div>
</div>
<?php
   include 'outro.php';?>