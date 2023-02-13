<?php
$curl = curl_init();
$data = json_encode("{\"dsajod\": \"adsadasds\"}");
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://localhost:44324/api/dte/document/pruebapost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

print_r($response);
$decoded_response_object = json_decode($response);
print_r($decoded_response_object);
print_r($err);

?>