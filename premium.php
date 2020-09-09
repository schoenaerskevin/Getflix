<?php
include 'dbreq.php';
//requête du droit de l'user
$droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
$droit->execute(array($_SESSION['pseudo']));
$droituser = $droit-> fetch();
  include 'intro.php';
      include 'menu.php';
?>
<h1> Bienvenue dans l'espace Premium !</h1>

<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
  frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
<?php
  include 'outro.php';
	?>    