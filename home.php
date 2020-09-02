
<?php
	session_start();

	$id_session = session_id();
// * done by Seb
// Connect to database
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=streamler;charset=utf8', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

// 12 random games
$req = $bdd->query('SELECT * FROM games');
?>

<div class="container-fluid">
<div class="row">
<?php
while ($donnees = $req->fetch())
{
?>
<div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 text-center">
<a href='jeu.php?id=
<?php //add id to get the rigth jeu.php 
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
<?php
} 
// end while for comment
$req->closeCursor();
?>
</div>
</div>
