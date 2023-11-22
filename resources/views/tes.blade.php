<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaflet Geolocation Example</title>
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>
<body>

<div id="map" style="height: 400px;"></div>

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<!-- Leaflet Geolocation JavaScript -->
<script src="https://unpkg.com/leaflet-geosearch/dist/leaflet-geosearch.js"></script>

<script>
  var map = L.map('map').setView([0, 0], 2);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  // Tambahkan kontrol geolokasi
  map.locate({ setView: true, maxZoom: 16 });

  function onLocationFound(e) {
    var marker = L.marker(e.latlng).addTo(map);
    marker.bindPopup("Lokasi Anda").openPopup();
  }

  map.on('locationfound', onLocationFound);

  function onLocationError(e) {
    alert(e.message);
  }

  map.on('locationerror', onLocationError);
</script>

</body>
</html>
