<?php
// if(isset($_POST['formaddgames'])) {

$nom = htmlspecialchars($_POST['nom']);
$genre = htmlspecialchars($_POST['genre']);
$plateforme = htmlspecialchars($_POST['plateforme']);
$datessortie = htmlspecialchars($_POST['datesortie']);
$trailer = htmlspecialchars($_POST['trailer']);
 $cover = htmlspecialchars($_POST['cover']);
$synopsis = htmlspecialchars($_POST['synopsis']);



if(!empty($_POST['nom']) && !empty($_POST['genre']) && !empty($_POST['plateforme']) && !empty($_POST['datesortie']) && !empty($_POST['trailer'])&& !empty($_POST['synopsis']) ) {

 // inscrit pseudo,mail,droit dans table user
 $insertmbr2 = $bdd->prepare("INSERT INTO games(nom,genre,plateforme,datesortie,trailer,cover,synopsis) VALUES(?,?,?,?,?,?,?)");                     
 $insertmbr2->execute(array($nom,$genre,$plateforme,$datessortie,$trailer,$cover, $synopsis));
 

 
}     
?> 

<div class="float-left">
<h1><u>ADD GAMES</u></h1>
         <p></p>
         <form method="POST" action="">
            <table>
               <tr>
                  <td>
                     Name: <br>
                     <input type="text"  Placeholder="..." id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     Genre: <br>
                     <input type="text"  Placeholder="..." id="genre" name="genre" value="<?php if(isset($genre)) { echo $genre; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     Platforms: <br>
                     <input type="text"  Placeholder="Platforms" id="plateforme" name="plateforme" value="<?php if(isset($plateforme)) { echo $plateforme; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     Release Date: <br>
                     <input type="date"  Placeholder="datesortie" id="datesortie" name="datesortie"value="<?php if(isset($datessortie)) { echo $datessortie; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     Trailer's URL: <br>
                     <input type="text"  Placeholder="Trailer URL" id="trailer" name="trailer" value="<?php if(isset($trailer)) { echo $trailer; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td>
                     Cover: <br>
                     <input type="file"  Placeholder="cover" id="cover" name="cover" accept="image/jpeg" value="<?php if(isset($cover)) { echo $cover; } ?>" />
                  </td>
               </tr> 
               <tr>
                  <td>
                     Synopsis: <br>
                     <input type="text"  Placeholder="Synopsis" id="synopsis" name="synopsis" value="<?php if(isset($synopsis)) { echo $synopsis; } ?>" />
                  </td>
                  <tr>
                  <td> <br>
                  <input class="btn-danger" type="submit" name="formaddgames" value="Add the game" />
                  </td>                     
                  </td>
               </tr>
            </table>   
         </form>   
</div>
         
