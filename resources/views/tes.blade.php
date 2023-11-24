<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deteksi Lokasi Pengguna</title>
    <!-- Tambahkan link Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- Tambahkan script Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>
<body>

<h1>Deteksi Lokasi Pengguna</h1>

<!-- Tambahkan div untuk peta -->
<div id="map"></div>

<p id="lokasi"></p>

<script>
    function dapatkanLokasi() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(tampilkanPosisi);
        } else {
            document.getElementById("lokasi").innerHTML = "Geolocation tidak didukung oleh browser ini.";
        }
    }

    function tampilkanPosisi(posisi) {
        var latitude = posisi.coords.latitude;
        var longitude = posisi.coords.longitude;

        document.getElementById("lokasi").innerHTML = "Lokasi Anda: Latitude " + latitude + ", Longitude " + longitude;

        // Tambahkan peta Leaflet
        var map = L.map('map').setView([latitude, longitude], 15);

        // Tambahkan layer peta dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // koordinat kantor
        var kantorCoords1 = [-7.007600624422205, 110.43700765001334]; //farmtech
        var kantorCoords2 = [-7.0102618, 110.4358351]; //farmhill

        // marker untuk lokasi pengguna
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Lokasi Anda')
            .openPopup();

        // Cek apakah pengguna berada di salah satu dari dua kantor
        var jarakKeKantor1 = L.latLng(latitude, longitude).distanceTo(L.latLng(kantorCoords1[0], kantorCoords1[1]));
        var jarakKeKantor2 = L.latLng(latitude, longitude).distanceTo(L.latLng(kantorCoords2[0], kantorCoords2[1]));
        var radiusKantor = 100; // Radius dalam meter

        if (jarakKeKantor1 <= radiusKantor || jarakKeKantor2 <= radiusKantor) {
            document.getElementById("lokasi").innerHTML += "<br>Anda berada di kantor.";
        } else {
            document.getElementById("lokasi").innerHTML += "<br>Anda tidak berada di kantor.";
        }
    }

    // Panggil fungsi saat halaman dimuat
    window.onload = dapatkanLokasi;
</script>

</body>
</html>
