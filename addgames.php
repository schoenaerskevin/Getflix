<?php
// if(isset($_POST['formaddgames'])) {

$nom = htmlspecialchars($_POST['nom']);
$genre = htmlspecialchars($_POST['genre']);
$plateforme = htmlspecialchars($_POST['plateforme']);
$datessortie = htmlspecialchars($_POST['datesortie']);
$trailer = htmlspecialchars($_POST['trailer']);
 $cover = htmlspecialchars($_POST['cover']);
$synopsis = htmlspecialchars($_POST['synopsis']);



// if(!empty($_POST['nom']) && !empty($_POST['genre']) && !empty($_POST['plateforme']) && !empty($_POST['datesortie']) && !empty($_POST['trailer'])&& !empty($_POST['synopsis']) ) {

 // inscrit pseudo,mail,droit dans table user
 $insertmbr2 = $bdd->prepare("INSERT INTO games(nom,genre,plateforme,datesortie,trailer,cover,synopsis) VALUES(?,?,?,?,?,?,?)");                     
 $insertmbr2->execute(array($nom,$genre,$plateforme,$datessortie,$trailer,$cover, $synopsis));
 //$erreur = "Votre jeu a bien été ajouté !" ;
//} else {
//    $erreur = "nom !";

// } else {
// $erreur = "genre !";

// } else {
// $erreur = "plateforme !";

// } else {
// $erreur = "datesortie !";

// } else {
// $erreur = "trailer !";

// } else {
// $erreur = "cover !";
// } else {
//    $erreur = "synopsis !";

// }
                     

?>
<!-- if(isset($erreur)) {
   echo '<font color="red">'.$erreur."</font>"; -->

<?php 


?>
      
      <div align="center">
         <p></p>
         <form method="POST" action="">
            <table>
               <tr>
               
                  <td align="right">
                     <label for="nom">nom :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="nom du jeu" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="genre">genre :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="genre" id="genre" name="genre" value="<?php if(isset($genre)) { echo $genre; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="plateforme">plate-forme :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="plateforme" id="plateforme" name="plateforme" value="<?php if(isset($plateforme)) { echo $plateforme; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="datesortie">date-sortie :</label>
                  </td>
                  <td>
                     <input type="date" placeholder="datesortie" id="datesortie" name="datesortie"value="<?php if(isset($datessortie)) { echo $datessortie; } ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="trailer">url trailer :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="url trailer" id="trailer" name="trailer" value="<?php if(isset($trailer)) { echo $trailer; } ?>" />
                  </td>
               </tr>
               <tr>
                <td align="right">
                     <label for="cover">cover :</label>
                  </td>
                  <td>
                     <input type="file" placeholder="cover" id="cover" name="cover" accept="image/jpeg" value="<?php if(isset($cover)) { echo $cover; } ?>" />
                  </td>
               </tr> 
               <tr>
               <td align="right">
                     <label for="synopsis">synopsis :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="synopsis" id="synopsis" name="synopsis" value="<?php if(isset($synopsis)) { echo $synopsis; } ?>" />
                  </td>
                  <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="formaddgames" value="Add the game" />
                  </td>
               </tr>
            </table>   
         </form>   
      </div>
