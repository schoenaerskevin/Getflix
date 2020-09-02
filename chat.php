<?php 

session_start();

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
            <div class="row">
                <div class="col-md-8">
                  <div class="page-header">
                    <h1><small class="pull-right">45 comments</small> Comments </h1>
                  </div> 
                   <div class="comments-list">
                       <div class="media">
                           <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                              <img src="http://lorempixel.com/40/40/people/1/">
                            </a>
                            <div class="media-body">
                                
                              <h4 class="media-heading user_name">Baltej Singh</h4>
                              Wow! this is really great.
                              
                              <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                            </div>
                          </div>
                       <div class="media">
                           <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                              <img src="http://lorempixel.com/40/40/people/2/">
                            </a>
                            <div class="media-body">
                                
                              <h4 class="media-heading user_name">Baltej Singh</h4>
                              Wow! this is really great.
                              
                              <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                            </div>
                          </div>
                       <div class="media">
                           <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                              <img src="http://lorempixel.com/40/40/people/3/">
                            </a>
                            <div class="media-body">
                                
                              <h4 class="media-heading user_name">Baltej Singh</h4>
                              Wow! this is really great.
                              
                              <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                            </div>
                          </div>
                       <div class="media">
                           <p class="pull-right"><small>5 days ago</small></p>
                            <a class="media-left" href="#">
                              <img src="http://lorempixel.com/40/40/people/4/">
                            </a>
                            <div class="media-body">
                                
                              <h4 class="media-heading user_name">Baltej Singh</h4>
                              Wow! this is really great.
                              
                              <p><small><a href="">Like</a> - <a href="">Share</a></small></p>
                            </div>
                          </div>
                   </div>
                    
                    
                    
                </div>
            </div>
        </div>
<!--form to add message to chat-->
<form method="POST" action="" class="form-group"> 

<label for="comment"><H2>Chat</H2></label>
<input type="text" name="comment" class="form-control">
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

// last 20 comments
$req = $bdd->query('SELECT id, pseudo, comment FROM chat ORDER BY id DESC LIMIT 0, 20');

while ($donnees = $req->fetch())
{
?>
<div class="chat" id="chatBox" onload="refreshTimer()">
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
</div>
<?php
} 
// end while for comment
$req->closeCursor();


?>

