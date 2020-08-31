<?php
//link base de donné
session_start();
try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
//permet a l'admin de valider ou supprimer un membre 
if(isset($_GET['type']) AND $_GET['type'] == 'membre') {
   if(isset($_GET['confirme']) AND !empty($_GET['confirme'])) {
      $confirme = (int) $_GET['confirme'];
      $req = $bdd->prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
      $req->execute(array($confirme));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM membres WHERE id = ?');
      $req->execute(array($supprime));
   }
   //permet de valider ou supprimer un message 
} elseif(isset($_GET['type']) AND $_GET['type'] == 'commentaire') {
   if(isset($_GET['approuve']) AND !empty($_GET['approuve'])) {
      $approuve = (int) $_GET['approuve'];
      $req = $bdd->prepare('UPDATE commentaires SET approuve = 1 WHERE id = ?');
      $req->execute(array($approuve));
   }
   if(isset($_GET['supprime']) AND !empty($_GET['supprime'])) {
      $supprime = (int) $_GET['supprime'];
      $req = $bdd->prepare('DELETE FROM chat WHERE id = ?');
      $req->execute(array($supprime));
   }
}
//requete pour afficher les  membres et messages
$membres = $bdd->query('SELECT * FROM user ORDER BY id ');
$commentaires = $bdd->query('SELECT * FROM chat ORDER BY id ');
$jeux = $bdd->query('SELECT * FROM games ORDER BY nom ');

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>Administration</title>
</head>
<body>
<?php include 'menu.php';?>
<ul>
      <?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?>- <a href="delete.php?id=<?= $m['id'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>
   <br /><br />
   <ul>
      <?php while($c = $commentaires->fetch()) { ?>
      <li><?= $c['pseudo'] ?> : <?= $c['comment'] ?> :  - <a href="delchat.php?id=<?= $c['id'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>
   <ul>

    <?php
//! function del games non fonctionnel 
   echo '<FORM method="get" action="delgames.php" ><select name="id">';
         while ($games=$jeux->fetch()) {
          echo '<option value="' . $games["id"] . '">' . $games["nom"] . '</option>';
        }
        
   echo '</select>';
   echo '<INPUT TYPE="submit"  VALUE=" supprimer ">';
   echo '</form>';
  


   





?> 
  
  </ul>

</body>
</html>

     