@extends('layouts.main')

@section('container')
<style>
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
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
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
                                    <h6>80</h6>
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
                            <h5 class="card-title">Total Project</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>75%</h6>
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
                            <h5 class="card-title">Skor KPI</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>65%</h6>
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
                            <h5 class="card-title">Skor OKR</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>65%</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-9 col-md-9">
                    <div class="card">
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
                            <h5 class="card-title">Statistik Absensi Karyawan</h5>
                            <div id="columnChart"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#columnChart"), {
                                        series: [{
                                            name: 'Hadir',
                                            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                                        }, {
                                            name: 'Sakit',
                                            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                                        }, {
                                            name: 'Izin',
                                            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
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
                                            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                                        },
                                        yaxis: {
                                            title: {
                                                text: 'jumlah pegawai'
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
                <div class="col-xxl-3 col-md-3">
                    <div class="card">
                        <div class="notif">
                            <a class="icon"><i class='bx bx-bell'></i></a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title-notif">Pengumuman</h5>
                            <div class="d-flex align-items-center">
                                <div class="pengumuman">
                                    <a href="">
                                        <span class="announce">What do you want to announce?</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection