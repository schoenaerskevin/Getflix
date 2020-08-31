
<?php
session_start();
//connection base de donnée
 try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}

 //*definition variable + requete  
//$req = $bdd->query('SELECT * FROM games ORDER BY nom DESC');
if(isset($_GET['search']) AND !empty($_GET['search'])) {
   $q = htmlspecialchars($_GET['search']);
   $req = $bdd->query('SELECT * FROM games WHERE nom LIKE "%'.$q.'%" ORDER BY nom DESC');

}
?>
 <!-- creation barre de recherche en html  -->

<form method="GET" action ="searchreq.php">
   <input type="search" name="search" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>
 
   
   
  
