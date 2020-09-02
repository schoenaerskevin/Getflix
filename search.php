
<?php
include 'dbreq.php';

 //*definition variable + requete  
//$req = $bdd->query('SELECT * FROM games ORDER BY nom DESC');
if(isset($_GET['search']) AND !empty($_GET['search'])) {
   $q = htmlspecialchars($_GET['search']);
   $req = $bdd->query('SELECT * FROM games WHERE nom LIKE "%'.$q.'%" ORDER BY nom DESC');

}
?>
 <!-- creation barre de recherche en html  -->
 <form class="form-inline my-2 my-lg-0" method="GET"  action ="searchreq.php">
   <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
   <button class="btn btn-outline-primary" type="submit">Search</button>
   </form>
 
   
   
  
