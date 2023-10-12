
<title>MAP Kekuatan Puskodal Marinir</title>
<link rel="stylesheet" href="leaflet.css" />
<script src="leaflet.js"></script>
<style>
html, body{height: 100%;margin: 0;}
.leaflet-container {
	height: 400px;
	width: 600px;
	max-width: 100%;
	max-height: 100%;
}
.leaflet-container .leaflet-control-attribution {
    background: #fff;
    font-size:.8rem;
    font-family: system-ui;
    font-weight: bold;
    margin: 10px;
    padding: 5px 10px;
    border-radius: 8px;
}
.leaflet-control-attribution svg{display:none!important;}
</style>
<div id="map" style="width:100vw; height:100vh"></div>
<script>

        let lat3 = " -6.1322535 ", lon3 = "106.8749151";


var map = L.map('map').setView([lat3, lon3], 10);
var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 260,
	attribution: '<a href="https://www.didanataneca.co.id/">&copy; DNE ZONE</a>'
}).addTo(map);
let mainload = async (endpoint = null, postset = null, cFunction = null) => {
        let res = await fetch(endpoint, postset);
        if (res.status == 200) { data = await res.json(); return cFunction(data); }
        else { return flashn(); }
    };


mainload("https://test.test/subdist/anu.php", get = { method: 'GET' }, config = (data) => {

    data.Payload.forEach((elpos)=>{
        console.log(elpos.Latitude+" "+elpos.Longitude+" - "+elpos.CarrierCode);
        var marker = L.marker([elpos.Latitude, elpos.Longitude], {alt:elpos.CarrierCode}).addTo(map).bindPopup(elpos.CarrierCode+'<br> Lat:  '+elpos.Latitude+'  Lon: '+elpos.Longitude+'<br>2023-02-07');

    });
});
var marker = L.marker([lat3, lon3], {alt:"TAMU"}).addTo(map).bindPopup('TAMU <br> Lat:  -6.1322535  Lon: 106.8749151<br>2023-02-07');
</script>