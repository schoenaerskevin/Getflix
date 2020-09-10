
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


<footer class="sticky-footer page-footer font-small special-color-dark">
        
        <div class="container footer-copyright py-2 text-center">© 2020 Copyright:
        <a href="home.php"> Streamler </a>
        <span> - </span>
        <a href="terms.php"> Terms & Conditions</a>
        <span> - </span>
        <a href="newsletter.php">Newsletter</a>
        </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
	  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
	  <script src="assets/js/script.js"></script>
 </body>
 </html>
  
</body>
</html>
