@extends('layouts.main')

@section('container')

<style>
    table {
        background-color: white;
        margin-left: 10px;
    }

    .dashboard .absen-card {
        margin-bottom: 15px;
    }

    .card-title {
        margin-bottom: 0;
    }

    .button-absensi {
        margin-bottom: 20px;
        margin-top: 20px;
    }
    #map {
            height: 400px;
        }
</style>
<div class="pagetitle mt-3">
    <h1>Absensi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Absensi</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="card info-card">
        <div class="card-body">
            <div id="map" class="mt-4"></div>
            <p id="lokasi"></p>
        </div>
    </div>
</div>


<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card absen-card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('absenDatang', ['status' => 'Hadir']) }}" id="absenDatang">
                                @csrf
                            <h5 class="card-title">Absensi Datang</h5>
                            <div class="row">

                                    <div class="col-sm-12"> <input class="form-control" type="file" accept="image/*" id="formFile"> <input class="form-control" type="text" name="lokasi1" id="inputLokasi1"></div>

                            </div>
                            <div class="col-xxl-12 col-md-12 button-absensi">
                                <button id="btnHadir1" type="submit" class="btn btn-primary">Hadir</button>
                                <button id="btnIzin1" type="submit" class="btn btn-warning text-white">Izin</button>
                                <button id="btnSakit1" type="submit" class="btn btn-danger">Sakit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card absen-card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('absenPulang', ['status' => 'Hadir']) }}" id="absenPulang">
                                @csrf
                            <h5 class="card-title">Absensi Pulang</h5>
                            <div class="row">

                                    <div class="col-sm-12"> <input class="form-control" type="file" accept="image/*" id="formFile"> <input class="form-control" type="text" name="lokasi2" id="inputLokasi2"></div>

                            </div>
                            <div class="col-xxl-12 col-md-12 button-absensi">
                                <button id="btnHadir2" type="submit" class="btn btn-primary">Hadir</button>
                                <button id="btnIzin2" type="submit" class="btn btn-warning text-white">Izin</button>
                                <button id="btnSakit2" type="submit" class="btn btn-danger">Sakit</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Absensi</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absensi as $row)
                        <tr>
                            <td>{{ $row->absensi }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>
                            <td>{{ $row->time }}</td>
                            <td>{{ $row->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

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
        var kantorCoords1 = [-6.996941, 110.424622]; //tes
        // var kantorCoords1 = [-7.007600624422205, 110.43700765001334]; //farmtech
        var kantorCoords2 = [-7.0102618, 110.4358351]; //farmhill

        // marker untuk lokasi pengguna
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Lokasi Anda')
            .openPopup();

        // Cek apakah pengguna berada di salah satu dari dua kantor
        var jarakKeKantor1 = L.latLng(latitude, longitude).distanceTo(L.latLng(kantorCoords1[0], kantorCoords1[1]));
        var jarakKeKantor2 = L.latLng(latitude, longitude).distanceTo(L.latLng(kantorCoords2[0], kantorCoords2[1]));
        var radiusKantor = 100; // Radius dalam meter

        var lokasiText = "tidak di kantor";

        if (jarakKeKantor1 <= radiusKantor || jarakKeKantor2 <= radiusKantor) {
            document.getElementById("lokasi").innerHTML += "<br>Anda berada di kantor.";
            lokasiText = "di kantor";
        } else {
            document.getElementById("lokasi").innerHTML += "<br>Anda tidak berada di kantor.";


            document.getElementById("btnHadir1").addEventListener("click", function() {
                alert("Anda tidak berada di kantor!");
            });

            document.getElementById("btnIzin1").addEventListener("click", function() {
                alert("Anda tidak berada di kantor!");
            });

            document.getElementById("btnSakit1").addEventListener("click", function() {
                alert("Anda tidak berada di kantor!");
            });

            document.getElementById("btnHadir2").addEventListener("click", function() {
                alert("Anda tidak berada di kantor!");
            });

            document.getElementById("btnIzin2").addEventListener("click", function() {
                alert("Anda tidak berada di kantor!");
            });

            document.getElementById("btnSakit2").addEventListener("click", function() {
                alert("Anda tidak berada di kantor!");
            });
        }
        document.getElementById("inputLokasi1").value = lokasiText;
        document.getElementById("inputLokasi2").value = lokasiText;
    }

    // Panggil fungsi saat halaman dimuat
    window.onload = dapatkanLokasi;
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Add event listeners to buttons
        document.getElementById("btnHadir1").addEventListener("click", function() {
            updateFormAction("Hadir");
        });

        document.getElementById("btnIzin1").addEventListener("click", function() {
            updateFormAction("Izin");
        });

        document.getElementById("btnSakit1").addEventListener("click", function() {
            updateFormAction("Sakit");
        });

        document.getElementById("btnHadir2").addEventListener("click", function() {
            updateFormAction("Hadir");
        });

        document.getElementById("btnIzin2").addEventListener("click", function() {
            updateFormAction("Izin");
        });

        document.getElementById("btnSakit2").addEventListener("click", function() {
            updateFormAction("Sakit");
        });
    });

    function updateFormAction(status) {
        // Get the form element
        var formDatang = document.getElementById("absenDatang");
        var formPulang = document.getElementById("absenPulang");

        // Update the form action based on the selected status
        formDatang.action = "{{ route('absenDatang', ['status' => 'STATUS']) }}".replace('STATUS', status);
        formPulang.action = "{{ route('absenPulang', ['status' => 'STATUS']) }}".replace('STATUS', status);

        // Submit the form
        formDatang.submit();
        formPulang.submit();
    }
</script>


@endsection