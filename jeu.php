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
<H2 class="font-weight-bold"><u><br><?php echo $jeuinfo['nom']; ?></u></H2>
<div style ="color:white" class="container">
  <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 responsive"><br>
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
      <div class="col-sm-12 col-md-10 col-lg-8 col-xl-8">
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
      <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <H4 class="font-weight-"><u>Genre:</u></h4>
        <p><?php echo $jeuinfo['genre']; ?></p>
        <H4 class="font-weight-bold"><u>Platforms:</u></h4>
        <p ><?php echo $jeuinfo['plateforme']; ?></p>
        <H4 class="font-weight-bold"><u>Date:</u></h4>
        <p><?php echo $jeuinfo['datesortie']; ?></p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-8 col-xl-8">
        <h4 class="font-weight-bold"><u>Synopsis:</u></h4>
        <p><?php echo $jeuinfo['synopsis']; ?></p>
        <br>
        <br>
        <hr>
        <br>
      
      </div>
  </div>
</div>
<?php   
}
?>

<?php
  include 'comment.php';
?> 

<footer class="sticky-footer page-footer font-small special-color-dark">
        
        <div class="container footer-copyright py-2 text-center">© 2020 Copyright:
        <a href="home.php"> Streamler </a>
        <span> - </span>
        <a href="terms.php"> Terms & Conditions</a>
        <span> - </span>
        <a href="newsletter.php">Newsletter</a>
        </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
	  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
	  <script src="assets/js/script.js"></script>
 </body>
 </html>
  
</body>
</html>




