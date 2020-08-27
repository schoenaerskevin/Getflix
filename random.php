<?php

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

// 10 random games
$req = $bdd->query('SELECT * FROM games ORDER BY RAND() LIMIT 10');

while ($donnees = $req->fetch())
{
?>
<div class="image">
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
