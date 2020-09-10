<?php
include 'dbreq.php';
 
if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   //permet de changer le pseudo
   if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['pseudo']) {
      $newpseudo = htmlspecialchars($_POST['newpseudo']);
      $insertpseudo = $bdd->prepare("UPDATE user SET pseudo = ? WHERE id = ?");
      $insertpseudo->execute(array($newpseudo, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   //permet ce changer le mail
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE user SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   //permet de changer le mdp
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE mdp SET mdp = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
?>
<?php 
include 'intro.php';
include 'menu.php';
?>
      <div align="center"><br><br>
         <h2><u>PROFILE EDITION</u></h2>
         <div align="center">
            <form method="POST" action="" enctype="multipart/form-data">
               <label>Username :</label> <br>
               <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo']; ?>" /><br /><br />
               <label>Email :</label> <br>
               <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
               <label>Password :</label> <br>
               <input type="password" name="newmdp1" placeholder="Password"/><br /><br />
               <label>Confirm password :</label> <br>
               <input type="password" name="newmdp2" placeholder="Confirm password" /><br /><br />
               <input class ="btn-danger" type="submit" value="Update my profile !" />
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>

<?php   
}
else {
   header("Location: connexion.php");
}
?>
<?php
include 'outro.php';
?> 