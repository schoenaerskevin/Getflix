<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
                .img-container2{
                position:relative;
                display:inline-block;
                }
                .img-container2 .overlay2{
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:black;
                opacity:0;
                transition:opacity 300ms ease-in-out;
                }
                .img-container2:hover .overlay2{
                opacity:0.9;
                border-radius: 5%;
                font-size:20px;
                font-family:impact;

                }
                .overlay2 span{
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                color:white;
                }
        </style>
</head>
<body>
 <a href="platefiltre.php?plateforme=PS4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/playstation.png" alt="playstation" height="100px"border="0"></a>
         
         <?php
         include 'dbreq.php';
         //requête du droit de l'user
         $droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
         $droit->execute(array($_SESSION['pseudo']));
         $droituser = $droit-> fetch();
 
         $q = htmlspecialchars('PS4');
         $req = $bdd->query('SELECT * FROM games WHERE plateforme LIKE "%'.$q.'%" ORDER BY RAND() LIMIT 6');
         ?>
 
         <div class="container-fluid">
         <div class="row">
         <?php
         while ($donnees = $req->fetch())
         {
         ?>
         <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 text-center">
                 <div class="img-container2">
                 <a href='jeu.php?id=
         <?php //add id to get the rigth jeu.php 
                 echo htmlspecialchars($donnees['id']);
         ?>'>
 
         <img class= "m-2 border border-white rounded-lg" src="
 
                 <?php
                         //img from db
                         echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $donnees['cover'] )); 
                 ?>
                 " alt="
                 <?php
                         //nom from db
                         echo htmlspecialchars($donnees['nom']); 
                 ?>
                 ">
                 <div class="overlay2">
                         <span><?php
                                 echo $donnees['nom'];
                         ?></span>
                 </div>
                 </a>
                 </div>
                 
         
         </div>
         <?php
         } 
         // end while for comment
         $req->closeCursor();
         ?>
         </div>
         </div>
         <a href="filtre.php?plateforme=PS4" style="color:white;" class="linkto float-right" role="button">Click Here for More...</a>
 
 <hr>

<a href="platefiltre.php?plateforme=Xbox"><img src="assets/img/xbox.png" alt="xbox" width="200px"border="0"></a>
        
        <?php
        include 'dbreq.php';
        //requête du droit de l'user
        $droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
        $droit->execute(array($_SESSION['pseudo']));
        $droituser = $droit-> fetch();

        $q = htmlspecialchars('Xbox');
        $req = $bdd->query('SELECT * FROM games WHERE plateforme LIKE "%'.$q.'%" ORDER BY RAND() LIMIT 6');
        ?>

<div class="container-fluid">
         <div class="row">
         <?php
         while ($donnees = $req->fetch())
         {
         ?>
         <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 text-center">
                 <div class="img-container2">
                 <a href='jeu.php?id=
         <?php //add id to get the rigth jeu.php 
                 echo htmlspecialchars($donnees['id']);
         ?>'>
 
         <img class= "m-2 border border-white rounded-lg" src="
 
                 <?php
                         //img from db
                         echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $donnees['cover'] )); 
                 ?>
                 " alt="
                 <?php
                         //nom from db
                         echo htmlspecialchars($donnees['nom']); 
                 ?>
                 ">
                 <div class="overlay2">
                         <span><?php
                                 echo $donnees['nom'];
                         ?></span>
                 </div>
                 </a>
                 </div>
                 
         
         </div>
         <?php
         } 
         // end while for comment
         $req->closeCursor();
         ?>
         </div>
         </div>
         <a href="platefiltre.php?plateforme=Xbox" style="color:white;" class="linkto float-right" role="button">Click Here for More...</a>
 
 <hr>

<br>
<a href="platefiltre.php?plateforme=Switch">&nbsp;&nbsp;&nbsp;<img src="assets/img/nintendo.png" alt="nintendo" height="100px"border="0"></a>        
        <?php
        include 'dbreq.php';
        //requête du droit de l'user
        $droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
        $droit->execute(array($_SESSION['pseudo']));
        $droituser = $droit-> fetch();

        $q = htmlspecialchars('Switch');
        $req = $bdd->query('SELECT * FROM games WHERE plateforme LIKE "%'.$q.'%" ORDER BY RAND() LIMIT 6');
        ?>

<div class="container-fluid">
         <div class="row">
         <?php
         while ($donnees = $req->fetch())
         {
         ?>
         <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 text-center">
                 <div class="img-container2">
                 <a href='jeu.php?id=
         <?php //add id to get the rigth jeu.php 
                 echo htmlspecialchars($donnees['id']);
         ?>'>
 
         <img class= "m-2 border border-white rounded-lg" src="
 
                 <?php
                         //img from db
                         echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $donnees['cover'] )); 
                 ?>
                 " alt="
                 <?php
                         //nom from db
                         echo htmlspecialchars($donnees['nom']); 
                 ?>
                 ">
                 <div class="overlay2">
                         <span><?php
                                 echo $donnees['nom'];
                         ?></span>
                 </div>
                 </a>
                 </div>
                 
         
         </div>
         <?php
         } 
         // end while for comment
         $req->closeCursor();
         ?>
         </div>
         </div>
         <a href="platefiltre.php?plateforme=Switch" style="color:white;" class="linkto float-right" role="button">Click Here for More...</a>
 
 <hr>



<article>
<br>
<a href="platefiltre.php?plateforme=PC">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/windows.png" alt="windows" width="200px"border="0"></a>
        
        <?php
        include 'dbreq.php';
        //requête du droit de l'user
        $droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
        $droit->execute(array($_SESSION['pseudo']));
        $droituser = $droit-> fetch();

        $q = htmlspecialchars('PC');
        $req = $bdd->query('SELECT * FROM games WHERE plateforme LIKE "%'.$q.'%" ORDER BY RAND() LIMIT 6');
        ?>

<div class="container-fluid">
         <div class="row">
         <?php
         while ($donnees = $req->fetch())
         {
         ?>
         <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 text-center">
                 <div class="img-container2">
                 <a href='jeu.php?id=
         <?php //add id to get the rigth jeu.php 
                 echo htmlspecialchars($donnees['id']);
         ?>'>
 
         <img class= "m-2 border border-white rounded-lg" src="
 
                 <?php
                         //img from db
                         echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $donnees['cover'] )); 
                 ?>
                 " alt="
                 <?php
                         //nom from db
                         echo htmlspecialchars($donnees['nom']); 
                 ?>
                 ">
                 <div class="overlay2">
                         <span><?php
                                 echo $donnees['nom'];
                         ?></span>
                 </div>
                 </a>
                 </div>
                 
         
         </div>
         <?php
         } 
         // end while for comment
         $req->closeCursor();
         ?>
         </div>
         </div>
         <a href="platefiltre.php?plateforme=Xbox" style="color:white;" class="linkto float-right" role="button">Click Here for More...</a>
 
 <hr>



<article>
<br>
<a href="platefiltre.php?plateforme=Mac">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/img/maclogo.png" alt="mac" height="100px"border="0"></a>
        
        <?php
        include 'dbreq.php';
        //requête du droit de l'user
        $droit = $bdd->prepare("SELECT * FROM user WHERE pseudo = ?");
        $droit->execute(array($_SESSION['pseudo']));
        $droituser = $droit-> fetch();

        $q = htmlspecialchars('PS4');
        $req = $bdd->query('SELECT * FROM games WHERE plateforme LIKE "%'.$q.'%" ORDER BY RAND() LIMIT 6');
        ?>

<div class="container-fluid">
         <div class="row">
         <?php
         while ($donnees = $req->fetch())
         {
         ?>
         <div class="col-sm-12 col-md-4 col-lg-3 col-xl-2 text-center">
                 <div class="img-container2">
                 <a href='jeu.php?id=
         <?php //add id to get the rigth jeu.php 
                 echo htmlspecialchars($donnees['id']);
         ?>'>
 
         <img class= "m-2 border border-white rounded-lg" src="
 
                 <?php
                         //img from db
                         echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $donnees['cover'] )); 
                 ?>
                 " alt="
                 <?php
                         //nom from db
                         echo htmlspecialchars($donnees['nom']); 
                 ?>
                 ">
                 <div class="overlay2">
                         <span><?php
                                 echo $donnees['nom'];
                         ?></span>
                 </div>
                 </a>
                 </div>
                 
         
         </div>
         <?php
         } 
         // end while for comment
         $req->closeCursor();
         ?>
         </div>
         </div>
         <a href="platefiltre.php?plateforme=Mac" style="color:white;" class="linkto float-right" role="button">Click Here for More...</a>
 
 <hr>



 </body>
</html>
