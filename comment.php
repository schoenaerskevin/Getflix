<?php 
$idjeu = $_GET['id'];
//treatment of form of chat.php
if (isset($_POST['submit'])){   
    //if (isset($_SESSION['pseudo'])){
        if (isset($_POST['comment'])){
            // Insert comment into db           
            $req = $bdd->prepare('INSERT INTO comment (idjeu, pseudo, comment) VALUES(?, ?, ?)');
            $req-> execute(array($idjeu, $_SESSION['pseudo'], $_POST['comment']));
        }
   // }
}
// last 20 comments
$reqcomment = $bdd->prepare('SELECT * FROM comment WHERE idjeu = ?  ORDER BY id DESC LIMIT 0, 20');
$reqcomment-> execute(array($idjeu));


while ($donnees = $reqcomment->fetch())
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
?>
</div>
<!--form to add message to chat-->
<section class="">
<form method="POST" action="" class="form-group"> 
<label for="comment"><H2>Comment</H2></label>
<input type="text" name="comment" class="form-control">
<input class="btn btn-primary" type="submit" name="submit" value="Post">
</form> 
<div class="chat" id="chatBox"  >
</section>
