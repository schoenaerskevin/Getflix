<?php
session_start();



 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
 
if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
   $membres = $bdd->query('SELECT * FROM user ORDER BY id ');
?>
<?php 
include 'intro.php';
include 'menu.php';
?>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
         <?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?>- <a href="delherprofil.php?id=<?= $m['id'] ?>">Supprimer</a></li>
      <?php } ?>
         <a href="index.php">menu</a>
         <?php
         }
         ?>
      </div>
<?php   
}
?>
<?php
include 'outro.php';
?> 