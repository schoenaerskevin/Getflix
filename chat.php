<?php 

include 'dbreq.php';
include 'intro.php';
include 'menu.php';
//treatment of form of chat.php
if (isset($_POST['submit'])){   
    //if (isset($_SESSION['pseudo'])){
        if (isset($_POST['comment'])){
            // Insert chat into db
            
            $req = $bdd->prepare('INSERT INTO chat (pseudo, comment) VALUES(?, ?)');
            $req->execute(array($_SESSION['pseudo'], $_POST['comment']));
            
            
            
        }
   // }
}
?>
<!--form to add message to chat-->
<section class="">
<form method="POST" action="" class="form-group"> 
<label for="comment"><H2>Chat</H2></label>
<input type="text" name="comment" class="form-control">
<input class="btn btn-primary" type="submit" name="submit" value="Post">
</form> 
<div class="chat" id="chatBox"  >
<?php 
include "chatbox.php";
?>
</div>
</section>
<?php 
include 'outro.php';
?>
