
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:black">
    <a style="font-family: 'Londrina Shadow', cursive; font-size:3em" class="logo navbar-brand" href="home.php"><i
            class="fa fa-gamepad" style="font-size:1em"></i> <img
            src="https://fontmeme.com/permalink/200903/a5e3585f8b36c0d7384a137bc9d64a60.png" alt="netflix-font"
            border="0"> </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=adventure">Adventure <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=arcade">Arcade <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=indie">Indie <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=shooter">FPS <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=platform">Platform <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=puzzle">Puzzle <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=racing">Racing <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=rpg">RPG <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=simulation">Simulation <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=sport">Sports <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=strategy">Strategy <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="filtre.php?genre=tactical">Tactical <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    



        <?php
//*definition variable + requete  
//$req = $bdd->query('SELECT * FROM games ORDER BY nom DESC');
if(isset($_GET['search']) AND !empty($_GET['search'])) {
  $q = htmlspecialchars($_GET['search']);
  $req = $bdd->query('SELECT * FROM games WHERE nom LIKE "%'.$q.'%" ORDER BY nom DESC');
}
?>

        <form class="form-inline my-2 my-lg-0" method="GET" action="searchreq.php">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search Any Game..." aria-label="Search">
            <button class="btn btn-outline-danger" type="submit">Search</button>
            <?php   
                            if ($droituser['droit']=="premium" || $droituser['droit']=="admin"){
                                echo '<a class="m-1 btn btn-outline-danger" href="premium.php" role="button">Premium</a>';
                            }
                            if ($droituser['droit']){
                                echo ' <a class="m-1 btn btn-outline-danger" href="deconnexion.php" role="button">Log Out</a>';
                                echo ' <a class="m-1 btn btn-outline-danger" href="profil.php" role="button">Profile</a>';
                            }else {
                                ;echo '<a class="m-1 btn btn-outline-danger" href="connexion.php" role="button">Log In</a>';
                            }
                            
                        ?>
            <!-- <a class="m-1 btn btn-outline-danger" href="profil.php" role="button">Profile</a> -->

            <?php 
                            if ($droituser['droit']=="admin"){
                                echo '<a class="btn btn-outline-danger pull-right" href="admin.php" role="button">Admin</a>';
                            }
                        ?>
        </form>

</nav>

