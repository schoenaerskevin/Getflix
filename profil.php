<?php
include 'dbreq.php';
 
if($_SESSION['id']) {
   $getid = intval($_SESSION['id']);
   $requser = $bdd->prepare('SELECT * FROM user WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
   
?>
<?php 
include 'intro.php';
include 'menu.php';
?>
      <div align="center">
         <h2>Profile of <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Edit my profile</a>
         <p></p>
         <a href="deconnexion.php">Log out</a>
       <p></p>
       <?= $userinfo['pseudo'] ?>- <a href="delherprofil.php?id=<?= $_SESSION['id'] ?>">Delete</a>
      <?php } ?>
      <p></p>
         <a href="index.php">menu</a>
      </div>
<?php   
}
?>
<?php
include 'outro.php';
?> 