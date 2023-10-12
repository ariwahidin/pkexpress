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
                <h3>Posisi Kendaraan</h3>
            </div>
        </div>

    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="map" style="width:100vw; height:100vh"></div>
            </div>
        </div>
    </div>
</section>
<script>
    let lat3 = " -6.1322535 ",
        lon3 = "106.8749151";


    var map = L.map('map').setView([lat3, lon3], 11);
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


    mainload("http://103.135.26.106:23407/pkexpress-development/position/getpositionkendaraan", get = {
        method: 'GET'
    }, config = (data) => {
        // console.log(data)

        data.forEach((elpos) => {
            console.log(elpos.Latitude + " " + elpos.Longitude + " - " + elpos.CarrierCode);
            var marker = L.marker([elpos.Latitude, elpos.Longitude], {
                alt: elpos.CarrierCode
            }).addTo(map).bindPopup(elpos.CarrierCode + '<br> Lat:  ' + elpos.Latitude + ' <br> Lon: ' + elpos.Longitude + '<br> GPSDate: ' + elpos.GPSDate).openPopup();

        });
    });
    var marker = L.marker([lat3, lon3], {
        alt: "TAMU"
    }).addTo(map).bindPopup('Kantor <br> Lat:  -6.1322535 <br> Lon: 106.8749151');
</script>
<script>
    getPositionKendaraan()

    function getPositionKendaraan() {
        $.ajax({
            url : "http://192.168.60.14/anu/",
            method : "GET",
            success : function(response){
                console.log(response)
            }
        })
    }
</script>