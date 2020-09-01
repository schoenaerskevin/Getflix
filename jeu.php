<?php
session_start();
try
{
  try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
  //$bdd = new PDO('mysql:host=127.0.0.1;dbname=Streamler;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
//requête du droit de l'user
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();

if(isset($_GET['id'])) {
  $getid = intval($_GET['id']);
  $reqjeu = $bdd->prepare('SELECT * FROM games WHERE id = ?');
  $reqjeu->execute(array($getid));
  $jeuinfo = $reqjeu->fetch();

?>

<?php
  include 'intro.php';
      include 'menu.php';
?>
<div class="container">
  <div class="row">
      <div class="col-4">
        <H2><?php echo $jeuinfo['nom']; ?></H2>
        <div>
            
          <img src="
          <?php
                  //img from db
                  echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $jeuinfo['cover'] )); 
          ?>
          " alt="
          <?php
                  //nom from db
                  echo htmlspecialchars($jeuinfo['nom']); 
          ?>
          ">

        </div>
      </div>
      <div class="col-8">
          <br> <br>
      <iframe width="420" height="315"
        src="<?php echo $jeuinfo['trailer']; ?>"allowfullscreen>
        </iframe>
      </div>
  </div>
  <br>
  <div class="row">
      <div class="col-4">
        <H4>Genre:</h4>
        <p><?php echo $jeuinfo['genre']; ?></p>
        <br>
        <H4>Platforms:</h4>
        <p><?php echo $jeuinfo['plateforme']; ?></p>
        <br>
        <H4>Date:</h4>
        <p><?php echo $jeuinfo['datesortie']; ?></p>
      </div>
      <div class="col-8">
        <h4>Synopsis</h4>
        <p><?php echo $jeuinfo['synopsis']; ?></p>
      
      </div>
  </div>
</div>

<?php   
}
?>
<?php
if ($droituser['droit']=="premium" || $droituser['droit']=="admin"){
      	include 'chat.php';
  }
  include 'outro.php';
	  ?>    