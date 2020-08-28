<?php
	session_start();

	$id_session = session_id();
// * done by Seb
// Connect to database
try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler;charset=utf8', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

// 12 random games
$req = $bdd->query('SELECT * FROM games ORDER BY RAND() LIMIT 12');
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

<div class="container">
<div class="row">
<?php
while ($donnees = $req->fetch())
{
?>
<div class="col-sm-12 col-md-6 col-lg-3">
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
</div>
<?php
} 
// end while for comment
$req->closeCursor();
?>
</div>
</div>
<?php 
      include 'chat.php';

 	 ?>
</body>
 </html>