<?php
include 'dbreq.php';
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
      $req = $bdd->prepare('DELETE FROM comment WHERE id = ?');
      $req->execute(array($supprime));
   }
}
//requete pour afficher les  membres et messages
$membres = $bdd->query('SELECT * FROM user ORDER BY id ');
$commentaires = $bdd->query('SELECT * FROM comment ORDER BY id ');
$jeux = $bdd->query('SELECT * FROM games ORDER BY nom ');

?>

<?php 
include 'intro.php';
include 'menu.php';?>

<h1><u>PROFILES IN DATABASE</u></h1>
<ul>
      <?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?>- <a href="delete.php?id=<?= $m['id'] ?>">Delete</a></li>
      <?php } ?>
   </ul>

<h1><u>COMMENTS</u></h1>
   <p></p>
   <ul>
      <?php while($c = $commentaires->fetch()) { ?>
      <li><?= $c['pseudo'] ?> : <?= $c['comment'] ?> :   <a href="delchat.php?id=<?= $c['id'] ?>">Delete</a></li>
      <?php } ?>
   </ul>
   <ul>
      <?php while($m = $membres->fetch()) { ?>
      <li><?= $m['id'] ?> : <?= $m['pseudo'] ?>- <a href="delete.php?id=<?= $m['id'] ?>">Delete</a></li>
      <?php } ?>
   </ul>
   <ul>
   
    <?php 
       include 'addgames.php';
      ?> 
       <br><br>
       </ul>
    <?php
   
 //! ajout blanc dans table games a chaque actualisation de la page admin
   echo '<FORM method="get" action="delgames.php" ><select name="id">';
         while ($games=$jeux->fetch()) {
          echo '<option value="' . $games["id"] . '">' . $games["nom"] . '</option>';
        }
        
   echo '</select>';
   echo '<INPUT TYPE="submit" class="btn-danger" VALUE=" delete ">';
   echo '</form>';
  


   





?> 
  
  </ul>
  <?php
include 'outro.php';
?> 

     