@extends('layouts.main')

@section('container')
<style>
    .card-title-notif {
        margin-bottom: 0;
    }

    .card-title-notif h5 {
        padding-bottom: 0;
    }

    .announce {
        font-size: 14px;
        color: black;
        font-weight: 700;
    }
</style>
<div class="pagetitle mt-3">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/executive/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card sales-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Karyawan</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>{{ $jumlahKaryawan }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card revenue-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Admin</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>{{ $jumlahAdmin }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <div class="card info-card revenue-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Executive</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>{{ $jumlahExecutive }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-3">
                    <div class="card" data-toggle="modal" data-target="#pengumumanModal">
                        <div class="notif">
                            <a class="icon"><i class='bx bx-bell'></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title-notif">Pengumuman</h5>
                            <div class="d-flex align-items-center">
                                <div class="pengumuman">
                                        <span class="announce">What do you want to announce?</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="pengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buat Pengumuman</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="{{ route('submitPengumuman') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="announcementText">Isi Pengumuman:</label>
                                        <input type="text" class="form-control" id="announcementText" name="pengumuman" placeholder="What do you want to announce?">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xxl-12 col-md-12">
                <div class="card">
                    {{-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> --}}
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between align-items-center">
                        <h5>
                            Statistik Absensi Karyawan (Bulan)
                        </h5>

                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $tahun }}
                            </a>
                    
                            <!-- Dropdown items -->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    @for ($year = 2023; $year <= 2030; $year++)
                                    <li><a class="dropdown-item" href="{{ route('dash_executive') }}?tahun={{ $year }}&bulan={{ $bulan }}">{{ $year }}</a></li>
                                @endfor
                            </ul>
                        </div>
                    </div>


                        <div id="columnChart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#columnChart"), {
                                    series: [{
                                        name: 'Hadir',
                                        data: [{{ $jumlahHadirJanuari }}, {{ $jumlahHadirFebruari }}, {{ $jumlahHadirMaret }}, {{ $jumlahHadirApril }}, {{ $jumlahHadirMei }}, {{ $jumlahHadirJuni }}, {{ $jumlahHadirJuli }}, {{ $jumlahHadirAgustus }}, {{ $jumlahHadirSeptember }}, {{ $jumlahHadirOktober }}, {{ $jumlahHadirNovember }}, {{ $jumlahHadirDesember }}]
                                    }, {
                                        name: 'Sakit',
                                        data: [{{ $jumlahSakitJanuari }}, {{ $jumlahSakitFebruari }}, {{ $jumlahSakitMaret }}, {{ $jumlahSakitApril }}, {{ $jumlahSakitMei }}, {{ $jumlahSakitJuni }}, {{ $jumlahSakitJuli }}, {{ $jumlahSakitAgustus }}, {{ $jumlahSakitSeptember }}, {{ $jumlahSakitOktober }}, {{ $jumlahSakitNovember }}, {{ $jumlahSakitDesember }}]
                                    }, {
                                        name: 'Izin',
                                        data: [{{ $jumlahIzinJanuari }}, {{ $jumlahIzinFebruari }}, {{ $jumlahIzinMaret }}, {{ $jumlahIzinApril }}, {{ $jumlahIzinMei }}, {{ $jumlahIzinJuni }}, {{ $jumlahIzinJuli }}, {{ $jumlahIzinAgustus }}, {{ $jumlahIzinSeptember }}, {{ $jumlahIzinOktober }}, {{ $jumlahIzinNovember }}, {{ $jumlahIzinDesember }}]
                                    }, {
                                        name: 'Tidak Hadir',
                                        data: [{{ $jumlahTidakHadirJanuari }}, {{ $jumlahTidakHadirFebruari }}, {{ $jumlahTidakHadirMaret }}, {{ $jumlahTidakHadirApril }}, {{ $jumlahTidakHadirMei }}, {{ $jumlahTidakHadirJuni }}, {{ $jumlahTidakHadirJuli }}, {{ $jumlahTidakHadirAgustus }}, {{ $jumlahTidakHadirSeptember }}, {{ $jumlahTidakHadirOktober }}, {{ $jumlahTidakHadirNovember }}, {{ $jumlahTidakHadirDesember }}]
                                    }],
                                    chart: {
                                        type: 'bar',
                                        height: 350
                                    },
                                    plotOptions: {
                                        bar: {
                                            horizontal: false,
                                            columnWidth: '55%',
                                            endingShape: 'rounded'
                                        },
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        show: true,
                                        width: 2,
                                        colors: ['transparent']
                                    },
                                    xaxis: {
                                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                    },
                                    yaxis: {
                                        title: {
                                            text: 'Jumlah Absensi'
                                        }
                                    },
                                    fill: {
                                        opacity: 1
                                    },
                                    tooltip: {
                                        y: {
                                            formatter: function(val) {
                                                return val + " absensi"
                                            }
                                        }
                                    }
                                }).render();
                            });
                        </script>

                        <div class="card-title d-flex justify-content-between align-items-center mt-4">
                            <h5>
                                Statistik Absensi Karyawan (Hari)
                            </h5>

                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Bulan {{ $bulan }}
                                </a>

                                <!-- Dropdown items -->
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @for ($bulan = 1; $bulan <= 12; $bulan++)
                                        <li><a class="dropdown-item" href="{{ route('dash_executive') }}?tahun={{ $tahun }}&bulan={{ $bulan }}">{{ $bulan }}</a></li>
                                    @endfor
                                </ul>
                            </div>
                        </div>

                        <div id="columnChartHarian"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    <?php
                                        $data = [];
                                        for ($i = 1; $i <= $jumlahHari; $i++) {
                                            $data[] = $i;
                                        }
                                    ?>
                                    new ApexCharts(document.querySelector("#columnChartHarian"), {
                                        series: [{
                                            name: 'Hadir',
                                            data: <?php echo json_encode(array_values($jumlahHadirHarian)); ?>
                                        }, {
                                            name: 'Sakit',
                                            data: <?php echo json_encode(array_values($jumlahSakitHarian)); ?>
                                        }, {
                                            name: 'Izin',
                                            data: <?php echo json_encode(array_values($jumlahIzinHarian)); ?>
                                        }, {
                                            name: 'Tidak Hadir',
                                            data: <?php echo json_encode(array_values($jumlahTidakHadirHarian)); ?>
                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 350
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '55%',
                                                endingShape: 'rounded'
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            show: true,
                                            width: 2,
                                            colors: ['transparent']
                                        },


                                        xaxis: {
                                            categories: <?php echo json_encode($data); ?>,
                                        },
                                        yaxis: {
                                            title: {
                                                text: 'Jumlah Pegawai'
                                            }
                                        },
                                        fill: {
                                            opacity: 1
                                        },
                                        tooltip: {
                                            y: {
                                                formatter: function(val) {
                                                    return val + " orang"
                                                }
                                            }
                                        }
                                    }).render();
                                });
                            </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection