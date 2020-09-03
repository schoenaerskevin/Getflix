<?php
//début session utilisateur
	session_start();

	$id_session = session_id();
// Connect to database
try
{
    //! mise en comment de la ligne qui ne correspond pas
<<<<<<< HEAD
    $bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
    //$bdd = new PDO('mysql:host=localhost;dbname=streamler;charset=utf8', 'root', 'root');
     
=======
    //$bdd = new PDO('mysql:host=localhost;dbname=streamler', 'root', 'root');
    $bdd = new PDO('mysql:host=database;dbname=streamler;charset=utf8', 'root', 'root');
>>>>>>> 780d706c7ce61ae989292295550366243e530575
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
?>