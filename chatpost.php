<?php
// * done by Seb
// Connect to database
try
{
	$bdd = new PDO('mysql:host=database;dbname=Streamler;charset=utf8', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
//treatment of form of chat.php
if (isset($_POST['submit'])){   
    if (isset($_POST['pseudo'])){
        if (isset($_POST['chat'])){
            // Insert chat into db
            $req = $bdd->prepare('INSERT INTO Comment (pseudo, comment) VALUES(?, ?)');
            $req->execute(array($_POST['pseudo'], $_POST['chat']));
            // Redirect to chat
            header('Location: chat.php');
        }
    }
}
?>