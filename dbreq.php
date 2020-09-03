<?php
//début session utilisateur
	session_start();

	$id_session = session_id();
// Connect to database
try
{
    //! mise en comment de la ligne qui ne correspond pas
    //$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
    //$bdd = new PDO('mysql:host=localhost;dbname=streamler;charset=utf8', 'root', 'root');
    $bdd = new PDO('mysql:host=localhost;dbname=152340', '152340', 'Streamlerfreeweb');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
?>