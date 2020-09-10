<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api-v3.igdb.com/games",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"fields name;\nwhere rating > 98;\nlimit 10;",
  CURLOPT_HTTPHEADER => array(
    "user-key: b47cf209438a39c664e2ecdef4003048",
    "Content-Type: text/plain",
    "Cookie: __cfduid=d6d0df9c9cb89cc24006ff91ff243119f1599465272"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;



echo '<p></p>';

//$result = file_get_contents($curl);
$array = json_decode($response, true);

echo '<p></p>';
echo $array[9]['name'];



?>

<?php
  include 'intro.php';
      include 'menu.php';
?>
<div class="container">
  <div class="row">
      <div class="col-4  responsive">
        <H2 class="font-weight-bold"><u><?php echo $array[9]['name']; ?></u></H2>
        <div>
            
        <img class="m-2 border border-white rounded-lg responsive" src="
          <?php
                  //img from db
                  echo htmlspecialchars('data:image/jpeg;base64,'.base64_encode( $array[9]['cover'] )); 
          ?>
          " alt="
          <?php
                  //nom from db
                  echo htmlspecialchars($array[9]['cover']); 
          ?>
          ">

        </div>
      </div>
      <div class="col-8">
          <br> <br>
      <div class="embed-responsive embed-responsive-16by9">
      <iframe class="  border border-white rounded-lg embed-responsive-item " width="" height=""
        src="<?php echo $response['id']; ?>"allowfullscreen>
        </iframe>
      </div>
      </div>
  </div>
  <br>
  <div class="row">
      <div class="col-4">
        <H4 class="font-weight-bold"><u>Genre:</u></h4>
        <p><?php echo $jeuinfo['genre']; ?></p>
        <H4 class="font-weight-bold"><u>Platforms:</u></h4>
        <p ><?php echo $jeuinfo['plateforme']; ?></p>
        <H4 class="font-weight-bold"><u>Date:</u></h4>
        <p><?php echo $jeuinfo['datesortie']; ?></p>
      </div>
      <div class="col-8">
        <h4 class="font-weight-bold"><u>Synopsis:</u></h4>
        <p><?php echo $jeuinfo['synopsis']; ?></p>
      
      </div>
  </div>
</div>

<?php   

?>
<?php
  include 'outro.php';
	  ?>    

$options = array(
        'search' => 'the witcher',
        'fields' => array('name')