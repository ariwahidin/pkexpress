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

    public function getPositionKendaraan()
    {
        $ch = curl_init();

        // Set URL tujuan
        $url = 'http://192.168.60.14/anu/'; // Ganti dengan URL yang sesuai

        curl_setopt($ch, CURLOPT_URL, $url);

        // Aktifkan opsi untuk mengambil hasil respons
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Eksekusi permintaan
        $response = curl_exec($ch);

        // Periksa apakah ada kesalahan dalam permintaan cURL
        if (curl_errno($ch)) {
            echo 'Kesalahan cURL: ' . curl_error($ch);
        }

        // Tutup koneksi cURL
        curl_close($ch);

        // Lakukan sesuatu dengan respons yang diterima
        echo $response;
        // $curl = curl_init();
        // curl_setopt_array($curl, [
        //     CURLOPT_URL => "https://fleet.trackgps.ro/api/location/get-carriers-last-location",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => "{\"CarriersList\":[746,1114,4214,705,1115,3356,1117,1116],\"LanguageCode\":\"id\",\"StatusFilter\":[0,1,2]}",
        //     CURLOPT_HTTPHEADER => [
        //         "Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6IjZGMkUwNkM2ODlGODRBQUFFMkU2NDVDQTExNzQ2RTY5QjgzRDY1RTgiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJieTRHeG9uNFNxcmk1a1hLRVhSdWFiZzlaZWcifQ.eyJuYmYiOjE2OTcwMDY5MDgsImV4cCI6MTY5NzAzNTcwOCwiaXNzIjoiaHR0cHM6Ly9zc28udHJhY2tncHMucm8iLCJhdWQiOlsiaHR0cHM6Ly9zc28udHJhY2tncHMucm8vcmVzb3VyY2VzIiwiQ2FyUG9vbGluZ0FQSSIsIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSJdLCJjbGllbnRfaWQiOiJUcmFja0dQU1Y0Iiwic3ViIjoiZDhiZjhjYzctODRjNi00NDRmLTk5NTItODY0ZTZmZDFjM2VkIiwiYXV0aF90aW1lIjoxNjk3MDA2OTA4LCJpZHAiOiJsb2NhbCIsImRhdGFJZCI6IkZDMEIwODM5LTg1NTctNDNGMC05MkNFLTk5RDk4MzI1RUFGNyIsInVzZXJQcm9maWxlIjoiNjg3RjIwN0YtNzI5ODktMDAxNC0xMTA3OS02OTg4NTUwNTU1N0UiLCJhY2Nlc3NQZXJtaXNzaW9uIjpbIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSIsIlRyYWNrR1BTQXBpIl0sIm5hbWUiOiJHdWx0b20gWWFudGkiLCJjb21wYW55SWQiOiJCMzhBRkE0NS03OUFCLTQwQkYtOTI2OC0wMDcxNTU2RjFGRjAiLCJlbWFpbCI6InNpc3dvQHBhbmR1cmFzYS5jb20iLCJzY29wZSI6WyJvcGVuaWQiLCJwcm9maWxlIiwiQ2FyUG9vbGluZ0FQSSIsIklkZW50aXR5QXBpIiwiVHJhY2tHUFNWNEFwaSIsIm9mZmxpbmVfYWNjZXNzIl0sImFtciI6WyJwd2QiXX0.j2NK14MDgW36ObNcPgV_8sc7TPWiwbmj3ln35Ww8v44Ag2pM8-g9h-QFUNPF9v32176R-07PeFAGjRIR9ZUwuZJdmoq56dow4CVu58HXwZWCuyCaVnGdfO_qeudv3vYJnyTZ4u9FpOuoK4D0KdButz6qZ-IJe6uPlX3t0pjCtRA_g0z_JN8Lm6JI0R4kP9e44ki88_MR4IO5Somqjy0FklREt59T1akRF9mM0TToCgbHq_Lx33Akm06LLMjTI4hiogVMtn0JQ9VEwnLIAGep9DwETKJ6w14GWvlSc-w0nbJpG4AxkMCYeNtT6FkJFbykCqLKq0lGpjln8T9H0u783w",
        //         "Content-Type: application/json"
        //     ],
        // ]);

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     echo $response;
        // }
    }
}
