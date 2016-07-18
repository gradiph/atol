<!DOCTYPE html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js"></script>

<style>

#map {
width: 100%;
height: 500px;
border: 1px solid black;
}
</style>

<script type="text/javascript">

 //Mendefinisikan alamat icons yang akan digunakan
var customIcons = {
stasiun: {
icon: '{{ asset(\'icons/stasiun.png\') }}'
},
 monumen: {
icon: '{{ asset(\'icons/monumen.png\') }}'
},
museum: {
 icon: '{{ asset(\'icons/museum.png\') }}'
 },
 stadion: {
 icon: '{{ asset(\'icons/stadion.png\') }}'
 },
terminal: {
 icon: '{{ asset(\'icons/terminal.png\') }}'
 },
 bandara: {
 icon: '{{ asset(\'icons/bandara.png\') }}'
},
universitas: {
icon: '{{ asset(\'icons/universitas.png\') }}'
 }
 };

 function load() {
 var map = new google.maps.Map(document.getElementById("map"), {
 center: new google.maps.LatLng(-6.911717, 107.608060),
 zoom: 11,
mapTypeId: 'hybrid'
});
 var infoWindow = new google.maps.InfoWindow;

 // Bagian ini digunakan untuk mendapatkan data format XML yang dibentuk dalam datalokasimapsbdg.php
 downloadUrl("{{ asset('php/datalokasimapsbdg.php') }}", function(data) {
 var xml = data.responseXML;
 var markers = xml.documentElement.getElementsByTagName("marker");
for (var i = 0; i < markers.length; i++) {
 var name = markers[i].getAttribute("namaUsaha");
  var alamat = markers[i].getAttribute("alamatUsaha");
 var type = markers[i].getAttribute("category");
 var point = new google.maps.LatLng(
 parseFloat(markers[i].getAttribute("latitude")),
 parseFloat(markers[i].getAttribute("longtitude")));
var html = "<b>" + name +"</b><br>Alamat : " +alamat+"</br>";
 var icon = customIcons[type] || {};
 var marker = new google.maps.Marker({
 map: map,
 position: point,
 icon: icon.icon
 });
bindInfoWindow(marker, map, infoWindow, html);
 }
 });
 }

function bindInfoWindow(marker, map, infoWindow, html) {
google.maps.event.addListener(marker, 'click', function() {
 infoWindow.setContent(html);
infoWindow.open(map, marker);
 map.setZoom(12);
 map.setCenter(marker.getPosition());
 });
}



 function downloadUrl(url, callback) {
var request = window.ActiveXObject ?
 new ActiveXObject('Microsoft.XMLHTTP') :
new XMLHttpRequest;

request.onreadystatechange = function() {
 if (request.readyState == 4) {
 request.onreadystatechange = doNothing;
 callback(request, request.status);
 }
 };

 request.open('GET', url, true);
 request.send(null);
 }


 function doNothing() {}

 </script>
 </head>
 <body onLoad="load()">
 <center>
 <div id="map"></div>
 </center>
 </body>
 </html>