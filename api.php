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
  CURLOPT_POSTFIELDS =>"fields name; \nlimit 20;\nfields cover ;\nfields screenshots;",
  CURLOPT_HTTPHEADER => array(
    "user-key: b47cf209438a39c664e2ecdef4003048",
    "Content-Type: text/plain",
    "Cookie: __cfduid=d6d0df9c9cb89cc24006ff91ff243119f1599465272"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
