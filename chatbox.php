<?php
// last 20 comments
$req = $bdd->query('SELECT id, pseudo, comment FROM chat ORDER BY id DESC LIMIT 0, 20');

while ($donnees = $req->fetch())
{
?>

    <h3 class="pseudochat">
        <?php
        //pseudo from db
        echo htmlspecialchars($donnees['pseudo']); ?>
    </h3>
    
    <p class="chat">
    <?php
    //emoticones
    $emoticone = array (':angry:', ':care:', ':haha:', ':like:', ':love:', ':sad:', ':wow:' );
    $emoticoneacces = array ('<img src="assets/emoticone/angry.png" alt="angry emoticone">', '<img src="assets/emoticone/care.png" alt="care emoticone">', 
    '<img src="assets/emoticone/haha.png" alt="laugh emoticone">', '<img src="assets/emoticone/like.png" alt="like emoticone">', '<img src="assets/emoticone/love.png" alt="love emoticone">', 
    '<img src="assets/emoticone/sad.png" alt="sad emoticone">', '<img src="assets/emoticone/wow.png" alt="wow emoticone">');
    $donnees['comment'] = str_replace($emoticone ,$emoticoneacces ,$donnees['comment']);
    //comment from db
    echo nl2br($donnees['comment']);
    ?>
    </p>

<?php
} 
// end while for comment
$req->closeCursor();
?>