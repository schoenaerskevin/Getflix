<?php
    //On démarre une nouvelle session
    session_start();
    /*On utilise session_id() pour récupérer l'id de session s'il existe.
     *Si l'id de session n'existe  pas, session_id() rnevoie une chaine
     *de caractères vide*/
    

    try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
    //$bdd = new PDO('mysql:host=127.0.0.1;dbname=streamler', 'root', 'root');



   //  if(isset($_GET['id']) AND $_GET['id'] > 0) {
     
      echo "Bonjour ".$_SESSION['pseudo'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Londrina+Shadow&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/svg" href="assets/img/gamepad.svg">
       <style>

        body{
  background-color:#343a40;
  color:white;
}
        </style>
        <title>STREAMLER.COM</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a style="font-family: 'Londrina Shadow', cursive; font-size:3em" class="navbar-brand" href="index.php">STREAMLER.COM <i class="fa fa-gamepad" style="font-size:1em"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="random.php">Top 10 Games <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="random.php">Most Popular <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Genres
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Adventure</a>
          <a class="dropdown-item" href="#">Arcade</a>
          <a class="dropdown-item" href="#">Indie</a>
          <a class="dropdown-item" href="#">Fighting</a>
          <a class="dropdown-item" href="#">FPS</a>
          <a class="dropdown-item" href="#">Platform</a>
          <a class="dropdown-item" href="#">Puzzle</a>
          <a class="dropdown-item" href="#">Racing</a>
          <a class="dropdown-item" href="#">RPG</a>
          <a class="dropdown-item" href="#">Simulation</a>
          <a class="dropdown-item" href="#">Sports</a>
          <a class="dropdown-item" href="#">Strategy</a>
          <a class="dropdown-item" href="#">Tactical</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Platforms
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">PC (Windows)</a>
          <a class="dropdown-item" href="#">Playstation 4</a>
          <a class="dropdown-item" href="#">Xbox</a>
          <a class="dropdown-item" href="#">Nintendo Switch</a>
          <a class="dropdown-item" href="#">Mac OSx</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary" type="submit">Search</button>
      <a class="btn btn-outline-primary" href="connexion.php" role="button">Log In</a>
      <a class="btn btn-outline-primary" href="inscription.php" role="button">Sign Up</a>
    </form>
  </div>
</nav>


<footer class="page-footer font-small special-color-dark fixed-bottom">
        
        <div class="footer-copyright py-2 text-center">© 2020 Copyright:
        <a href="#"> streamler.com</a>
        <a class="btn btn-outline-primary pull-right" href="admin.php" role="button">Admin</a>
</footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>