<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://anu.test",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"CarriersList\":[746,1114,4214,705,1115,3356,1117,1116],\"LanguageCode\":\"id\",\"StatusFilter\":[0,1,2]}",
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjZGMkUwNkM2ODlGODRBQUFFMkU2NDVDQTExNzR6RTY5QjgzRDY1RTgiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJieTRHeG9uNFNxcmk1a1hLRVhSdWFiZzlaZWcifQ.eyJuYmYiOjE2OTcwMDY5MDgsImV4cCI6MTY5NzAzNTcwOCwiaXNzIjoiaHR0cHM6Ly9zc28udHJhY2tncHMucm8iLCJhdWQiOlsiaHR0cHM6Ly9zc28udHJhY2tncHMucm8vcmVzb3VyY2VzIiwiQ2FyUG9vbGluZ0FQSSIsIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSJdLCJjbGllbnRfaWQiOiJUcmFja0dQU1Y0Iiwic3ViIjoiZDhiZjhjYzctODRjNi00NDRmLTk5NTItODY4ZTZmZDFjM2VkIiwiYXV0aF90aW1lIjoxNjk3MDA2OTA4LCJpZHAiOiJsb2NhbCIsImRhdGFJZCI6IkZDMEIwODM5LTg1NTctNDNGMC05MkNFLTk5RDk4MzI1RUFGNyIsInVzZXJQcm9maWxlIjoiNjg3RjIwN0YtNzI5ODktMDAxNC0xMTA3OS06OTg4NTUwNTU1N0UiLCJhY2Nlc3NQZXJtaXNzaW9uIjpbIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSIsIlRyYWNrG0FQIiwib2ZmbGluZV9hY2Nlc3MiXSwiYW1yIjpbInB3ZCJdfQ.j2NK14MDgW36ObNcPgV_8sc7TPWiwbmj3ln35Ww8v44Ag2pM8-g9h-QFUNPF9v32176R-07PeFAGjRIR9ZUwuZJdmoq56dow4CVu58HXwZWCuyCaVnGdfO_qeudv3vYJnyTZ4u9FpOuoK4D0KdButz6qZ-IJe6uPlX3t0pjCtRA_g0z_JN8Lm6JI0R4kP9e44ki88_MR4IO5Somqjy0FklREt59T1akRF9mM0TToCgbHq_Lx33Akm06LLMjTI4hiogVMtn0JQ9VEwnLIAGep9DwETKJ6w14GWvlSc-w0nbJpG4AxkMCYeNtT6FkJFbykCqLKq0lGpjln8T9H0u783w",
    "Content-Type: application/json"
  ],
]);

// Add this line to disable SSL verification (use it carefully in production)
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
