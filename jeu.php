<?php
include 'dbreq.php';
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
<div class="container-fluid">
  <div class="row">
      <div class="col-4  responsive">
        <H2 class="font-weight-bold"><u><?php echo $jeuinfo['nom']; ?></u></H2>
        <div>
            
        <img class="m-2 border border-white rounded-lg responsive" src="
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
      <div class="embed-responsive embed-responsive-16by9">
      <iframe class="  border border-white rounded-lg embed-responsive-item " width="" height=""
        src="<?php echo $jeuinfo['trailer']; ?>"allowfullscreen>
        </iframe>
      </div>
      </div>
  </div>
  <br>
  <div class="row">
      <div class="col-4">
        <H4 class="font-weight-bold"><u>Genre:</u></h4>
        <p><?php echo $jeuinfo['genre']; ?></p>
        <H4 class="font-weight-bold"><u>Platforms:</u></h4>
        <p ><?php echo $jeuinfo['plate-forme']; ?></p>
        <H4 class="font-weight-bold"><u>Date:</u></h4>
        <p><?php echo $jeuinfo['date-sortie']; ?></p>
      </div>
      <div class="col-8">
        <h4 class="font-weight-bold"><u>Synopsis:</u></h4>
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