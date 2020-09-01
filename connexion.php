<?php
session_start();
 //link bdd
 try
 {
    $bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
 }
 //error
 catch(Exception $e)
 {
         die('Error : '.$e->getMessage());
 }
 //verifie que mail et mdp correspondent a une entree de la bdd
if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM user WHERE mail = ? ");
      $requser->execute(array($mailconnect));
      $requser1 = $bdd->prepare("SELECT * FROM mdp WHERE mdp = ? ");
      $requser1->execute(array( $mdpconnect));
      
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: index.php?id=".$_SESSION['id']);
      } else {
         //Renvoie erreur 
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>
<?php 
include 'intro.php';
include 'menu.php';
?>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="">
            <input type="email" name="mailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
      <?php
include 'outro.php';
?> 