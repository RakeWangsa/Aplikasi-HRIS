@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Skor KPI</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>{{ $totalNilaiAkhir }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Presentase Absensi</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>{{ $formattedPersentaseAbsensi }}%</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Akhir Kinerja</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>{{ $formattedTotalAkhirKinerja }}%</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $greetings }}, {{ auth()->user()->name }}!</h5>
                            <p>It's {{ $tanggal }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-8 col-md-8">
                    <div class="card">
                        <div class="notif">
                            <a class="icon"><i class='bx bx-bell'></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title-notif">Pengumuman</h5>
                            <div class="d-flex align-items-center">
                                <div class="pengumuman" style="max-height: 250px; overflow-y: auto;" id="latestAnnouncement">
                                    @foreach($pengumuman as $row)
                                        <div class="pb-2">
                                            <h6><strong>{{ $row->waktu }}</strong><br><br>{{ $row->pesan }}</h6>
                                            <hr class="dropdown-divider">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    window.onload = function() {
        // Fungsi untuk mengatur scroll ke bawah pada elemen dengan id "latestAnnouncement"
        function scrollToBottom() {
            var latestAnnouncement = document.getElementById('latestAnnouncement');
            latestAnnouncement.scrollTop = latestAnnouncement.scrollHeight;
        }

        // Panggil fungsi scrollToBottom() saat halaman dimuat
        scrollToBottom();
    };
</script>
@endsection