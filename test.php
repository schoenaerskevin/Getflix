<?php
    //On démarre une nouvelle session
    session_start();
    /*On utilise session_id() pour récupérer l'id de session s'il existe.
     *Si l'id de session n'existe  pas, session_id() rnevoie une chaine
     *de caractères vide*/
    $id_session = session_id();
    $bdd = new PDO('mysql:host=database;dbname=espace_membre', 'root', 'root');


   //  if(isset($_GET['id']) AND $_GET['id'] > 0) {
      $getid = intval($_GET['id']);
      $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
      $requser->execute(array($getid));
      $userinfo = $requser->fetch();
    
?>
<html>
   <head>
      <title>TUTO PHP</title>
      <meta charset="utf-8">
   </head>
   <body>
   <?php
            if($id_session){
                echo 'ID de session (récupéré via session_id()) : <br>'
                .$id_session. '<br>';
            }
            echo '<br><br>';
            if(isset($_COOKIE['PHPSESSID'])){
                echo 'ID de session (récupéré via $_COOKIE) : <br>'
                .$_COOKIE['PHPSESSID'];
            }
        ?>
   
   <button type="button" name="admin" value="admin" ><a href = "admin.php">admin</a>
   <button type="button" name="chat" value="chat" ><a href = "chat.php">chat</a>
   <button type="button" name="inscription" value="inscription"><a href = "inscription.php">inscription</a>
   <button type="button" name="connexion" value="connexion"><a href = "connexion.php">connexion</a></button>
   <?php
   echo '<p></p>';
   echo $_COOKIE["PHPSESSID"];
   echo '<p></p>';
   echo $_SESSION['id'];
   echo '<p></p>';
   echo $_SESSION['pseudo'];

   ?>
   
   </body>
</html>
