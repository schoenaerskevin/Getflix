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
         <br>
      <h2><u><?php echo $userinfo['pseudo'] . "'s" . " " . "Profile" ?></u></h2> <br> <br> 
      <table class="text-center">
         <tr>
            <td>
            <u>Username:</u>
            </td>
            <td>
            <?php echo $userinfo['pseudo']; ?>
            </td>
         </tr>
         <tr>
            <td>
            <u>Email:</u>
            </td>
            <td>
            <?php echo $userinfo['mail']; ?>
            </td>
         </tr>
      </table>
         
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <a href="editionprofil.php">Edit my Profile</a> <br>
         <a href="deconnexion.php">Log Out</a>
       <p></p>
       <a href="delherprofil.php?id=<?= $_SESSION['id'] ?>">Delete my profile</a>
      <?php } ?>
      <p></p>
      </div>
<?php   
}
include 'outro.php'
?>

