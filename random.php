<?php

// * done by Seb
// Connect to database
try
{
	$bdd = new PDO('mysql:host=database;dbname=Streamler;charset=utf8', 'root', 'root');
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
        ">
</div>
<?php
} 
// end while for comment
$req->closeCursor();
?>
