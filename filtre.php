
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Filtre.php</title>
        <style>
                .img-container2{
                position:relative;
                display:inline-block;
                }
                .img-container2 .overlay2{
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:black;
                opacity:0;
                transition:opacity 300ms ease-in-out;
                }
                .img-container2:hover .overlay2{
                opacity:0.9;
                border-radius: 5%;
                font-size:20px;
                font-family:impact;

                }
                .overlay2 span{
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                color:white;
                }
        </style>
</head>
<body>
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
echo '<br><u><h1> ' .  ucfirst($_GET['genre']) .'</h1></u><br>';
?>

<div class="container-fluid">
        <div class="row">
        <!-- renvoie la page dynamique en fonction de la recherche -->
        <?php 
        while($donnees = $req->fetch()) { 
        ?>
         <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 text-center">
                        <div class="img-container2">
                                <a href='jeu.php?id=<?php //add id to get the rigth jeu.php 
                                        echo htmlspecialchars($donnees['id']);
                                ?>'>
                                <img class="m-2 border border-white rounded-lg" src="
                                <?php
                                        echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $donnees['cover'] )); 
                                ?>
                                " alt="
                                <?php
                                        echo htmlspecialchars($donnees['nom']); 
                                ?>
                                ">
                                <div class="overlay2">
                                        <span>
                                                <?php
                                                        echo $donnees['nom'];
                                                ?>
                                        </span>
                                </div>
                                </a>
                        </div>
                </div>
                <?php }
                        $req->closeCursor();
                ?>
        </div>
</div>

<?php
include 'outro.php';
?> 
  
</body>
</html>
