<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('manifes_m');
        // check_not_login();
    }

    public function posisiKendaraan()
    {
        $data = array();
        $this->template->load('template', 'posisi/posisi_kendaraan', $data);
    }


    function loginApi()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://fleet.trackgps.ro/api/authentication/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "grant_type=password&client_id=TrackGPSV4&username=pandurasa&password=Pandurasa54321",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/x-www-form-urlencoded",
                "User-Agent: insomnia/8.2.0"
            ],
        ]);

        // Optionally, you can disable SSL certificate verification (not recommended for production)
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $newToken = json_decode($response, false)->access_token;
        // echo $new_token;
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $this->createJsonToken($newToken);
            // echo $response;
        }
    }

    function createJsonToken($newToken)
    {
        $data = array(
            'token' => $newToken,
        );

        $jsonData = json_encode($data);

        $namaBerkas = 'token.json';
        if (file_put_contents($namaBerkas, $jsonData)) {
            // echo 'Berkas Token JSON berhasil disimpan di server: ' . $namaBerkas;
            $this->getLastVechile();
        } else {
            echo 'Gagal menyimpan berkas JSON di server.';
        }
    }

    function getLastVechile()
    {

        $json_token = json_decode(file_get_contents('token.json'), false);
        $token = $json_token->token;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://fleet.trackgps.ro/api/location/get-carriers-last-location",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"CarriersList\":[746,1114,4214,705,1115,3356,1117,1116],\"LanguageCode\":\"id\",\"StatusFilter\":[0,1,2]}",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer " . $token,
                "Content-Type: application/json"
            ],
        ]);

        // Optionally, you can disable SSL certificate verification (not recommended for production)
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        // Get the HTTP status code
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        // error 1 ngga ada respon
        if ($httpStatus == 401) {
            // echo "login jalan";
            $this->loginApi();
            return false;
        }

        // error 2 nyambung tapi false
        if (json_decode($response, false)->IsSuccess == false) {
            // echo "login jalan jalan";
            $this->loginApi();
            return false;
        }

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    function getVechilePosition()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = new DateTime();
        $datetime = $now->format("Y-m-d H:i:s");

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://fleet.trackgps.ro/api/location/get-carrier-last-values",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"CarrierId\":705,\"GPSDate\":\"" . $datetime . "\",\"LanguageCode\":\"id\"}",
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjZGMkUwNkM2ODlGODRBQUFFMkU2NDVDQTExNzQ2RTY5QjgzRDY1RTgiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJieTRHeG9uNFNxcmk1a1hLRVhSdWFiZzlaZWcifQ.eyJuYmYiOjE2OTcyNDg5NTYsImV4cCI6MTY5NzI3Nzc1NiwiaXNzIjoiaHR0cHM6Ly9zc28udHJhY2tncHMucm8iLCJhdWQiOlsiaHR0cHM6Ly9zc28udHJhY2tncHMucm8vcmVzb3VyY2VzIiwiQ2FyUG9vbGluZ0FQSSIsIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSJdLCJjbGllbnRfaWQiOiJUcmFja0dQU1Y0Iiwic3ViIjoiZDhiZjhjYzctODRjNi00NDRmLTk5NTItODY0ZTZmZDFjM2VkIiwiYXV0aF90aW1lIjoxNjk3MjQ4OTU2LCJpZHAiOiJsb2NhbCIsImRhdGFJZCI6IkZDMEIwODM5LTg1NTctNDNGMC05MkNFLTk5RDk4MzI1RUFGNyIsInVzZXJQcm9maWxlIjoiNjg3RjIwN0YtNzI5ODktMDAxNC0xMTA3OS02OTg4NTUwNTU1N0UiLCJhY2Nlc3NQZXJtaXNzaW9uIjpbIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSIsIlRyYWNrR1BTQXBpIl0sIm5hbWUiOiJHdWx0b20gWWFudGkiLCJjb21wYW55SWQiOiJCMzhBRkE0NS03OUFCLTQwQkYtOTI2OC0wMDcxNTU2RjFGRjAiLCJlbWFpbCI6InNpc3dvQHBhbmR1cmFzYS5jb20iLCJzY29wZSI6WyJvcGVuaWQiLCJwcm9maWxlIiwiQ2FyUG9vbGluZ0FQSSIsIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSIsIm9mZmxpbmVfYWNjZXNzIl0sImFtciI6WyJwd2QiXX0.Mybrxw3az8eqJ155QpT--Dxf47vbPBjVzqr0CJ0qm5-M00rbPEcElkKBAy6dub_4xpMqbSTIkiApSgzgzasMpJ3xo4OBoKpvnmE4yzByNfa8h9q_WVs_JnOTzgpxoQepsYhCWUggsUg67M7qH56LEFDA33j482SqU7QE4hmt7q0LmKZFOgisNgZE_8XfF14ed9v2OxBhkc-Ny1xiyoTyulndKIHeIq1C8YATbffdxH9cyz5ob_U1x1O6uKnm-Zd7EO0F5aBr7JoBmBDaKwv7EqaawhZUN6Odg_vhlUln1sOeRZBh8js9MLpFhV8wVQwP7x0oheYtwE3avoBCX485Nw",
                "Content-Type: application/json"
            ],
        ]);

        // Optionally, you can disable SSL certificate verification (not recommended for production)
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function getApiGpsMulia()
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://api.muliatrack.com/wspubpandurasakharisma/service.asmx/GetJsonPosition?sPassword=PanduRa%24a1910",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => [
                "User-Agent: insomnia/8.2.0"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}
