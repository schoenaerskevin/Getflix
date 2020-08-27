<?php
//link base de donné
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
//requete pour afficher les 5 dernier membre et message
$membres = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,5');
$commentaires = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,5');
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>Administration</title>
</head>
<body>
<ul>
      <?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?><?php if($m['confirme'] == 0) { ?> - <a href="index.php?type=membre&confirme=<?= $m['id'] ?>">Confirmer</a><?php } ?> - <a href="index.php?type=membre&supprime=<?= $m['id'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>
   <br /><br />
   <ul>
      <?php while($c = $commentaires->fetch()) { ?>
      <li><?= $c['id'] ?> : <?= $c['pseudo'] ?> : <?= $c['contenu'] ?><?php if($c['approuve'] == 0) { ?> - <a href="index.php?type=commentaire&approuve=<?= $c['id'] ?>">Approuver</a><?php } ?> - <a href="index.php?type=commentaire&supprime=<?= $c['id'] ?>">Supprimer</a></li>
      <?php } ?>
   </ul>
</body>
</html>

     