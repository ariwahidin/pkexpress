<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

class Position extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('manifes_m');
        check_not_login();
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
}
