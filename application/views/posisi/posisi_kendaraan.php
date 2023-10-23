<script src="/pkexpress/leaflet.js"></script>
<link rel="stylesheet" href="/pkexpress/leaflet.css" />
<style>
    html,
    body {
        height: 100%;
        margin: 0;
    }

    .leaflet-container {
        height: 400px;
        width: 600px;
        max-width: 100%;
        max-height: 100%;
    }

    .leaflet-container .leaflet-control-attribution {
        background: #fff;
        font-size: .8rem;
        font-family: system-ui;
        font-weight: bold;
        margin: 10px;
        padding: 5px 10px;
        border-radius: 8px;
    }

    .leaflet-control-attribution svg {
        display: none !important;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-12">
                <strong>Posisi Kendaraan</strong>
            </div>
        </div>

    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div id="map" style="width:100vw; height:75vh"></div>
            </div>
        </div>
    </div>
</section>
<script>
    let lat3 = " -6.1322535 ",
        lon3 = "106.8749151";


    var map = L.map('map').setView([lat3, lon3], 10);

    var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 260,
        attribution: '<a href="https://www.pandurasa.com">&copy; PK</a>'
    }).addTo(map);


    let mainload = async (endpoint = null, postset = null, cFunction = null) => {
        let res = await fetch(endpoint, postset);
        if (res.status == 200) {
            data = await res.json();
            return cFunction(data);
        } else {
            return flashn();
        }
    };

    var marker = L.marker([lat3, lon3], {
        alt: "Kantor"
    }).addTo(map).bindPopup('Kantor <br> Lat:  -6.1322535 <br> Lon: 106.8749151');

    // api dari arrobs
    mainload("<?= base_url('position/getLastVechile') ?>", get = {
        method: 'GET'
    }, config = (data) => {
        data.Payload.forEach((elpos) => {
            // console.log(elpos.Latitude + " " + elpos.Longitude + " - " + elpos.CarrierCode);
            var marker = L.marker([elpos.Latitude, elpos.Longitude], {
                alt: elpos.CarrierCode
            }).addTo(map).bindPopup(elpos.CarrierCode + '<br> Lat:  ' + elpos.Latitude + ' <br> Lon: ' + elpos.Longitude + '<br> GPSDate: ' + elpos.GPSDate).openPopup();

        });
    });

    // api dari mulia track
    mainload("<?= base_url('position/getApiGpsMulia') ?>", get = {
        method: 'GET'
    }, config = (data) => {
        // console.log(data[0]['Address '])
        data.forEach((elpos) => {
            // console.log(elpos.Lat + " " + elpos.Lon + " - " + elpos.Nopol);
            var marker = L.marker([elpos.Lat, elpos.Lon], {
                alt: elpos.Nopol
            }).addTo(map).bindPopup('NoPol : ' + elpos.Nopol +
                '<br> Lat:  ' + elpos.Lat +
                '<br> Lon: ' + elpos.Lon +
                '<br> Address: ' + elpos['Address ']+
                '<br> GpsTime: ' + elpos.GpsTime).openPopup();
        });
    });
</script>