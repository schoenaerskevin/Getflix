<!--form to add message to chat-->
<form method="POST" action="chatpost.php" class="form-group"> 
<label for="pseudo">pseudo</label>
<input type="text" name="pseudo" class="form-control">
<label for="chat">Text</label>
<input type="text" name="chat" class="form-control">
<input class="btn btn-primary" type="submit" name="submit" value="Post">
</form> 

<?php 
// * done by Seb
// Connect to database
try
{
	$bdd = new PDO('mysql:host=database;dbname=streamler', 'root', 'root');
}
//error
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
// last 20 comments
$req = $bdd->query('SELECT ID, pseudo, chat FROM chat ORDER BY ID DESC LIMIT 0, 20');

while ($donnees = $req->fetch())
{
?>
<div class="chat">
    <h3 class="pseudochat">
        <?php
        //pseudo from db
        echo htmlspecialchars($donnees['pseudo']); ?>
    </h3>
    
    <p class="chat">
    <?php
    //comment from db
    echo nl2br(htmlspecialchars($donnees['chat']));
    ?>
    </p>
</div>
<?php
} 
// end while for comment
$req->closeCursor();
?>

