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
                                    <h6>80</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
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
                            <h5 class="card-title">Presentase Absensi</h5>
                            <div class="d-flex align-items-center">
                                <div class="text-h6">
                                    <h6>75%</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
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
                            <h5 class="card-title">Total Akhir Kinerja</h5>
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
                <div class="col-xxl-4 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Good evening, Auliya Putri!</h5>
                            <p>It's Saturday, 28 October</p>
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
                                <div class="pengumuman">
                                    <div>
                                        <h6>1. Nisi ut ut exercitationem voluptatem esse sunt rerum? Lorem ipsum dolor sit amet consectetur adipisicing elit.</h6>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <div class="pt-2">
                                        <h6>2. Reiciendis dolores repudiandae?</h6>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <div class="pt-2">
                                        <h6>3. Qui qui reprehenderit ut est illo numquam voluptatem?</h6>
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