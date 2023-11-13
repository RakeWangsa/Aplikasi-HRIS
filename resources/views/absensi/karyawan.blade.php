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
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card absen-card">
                        <div class="card-body">
                            <h5 class="card-title">Absensi Datang</h5>
                            <div class="row">
                                <div class="col-xxl-6 col-md-6"> <input type="date" class="form-control"></div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="col-sm-12"> <input class="form-control" type="file" id="formFile"></div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-md-12 button-absensi">
                                <button type="submit" class="btn btn-primary">Hadir</button>
                                <button type="submit" class="btn btn-warning text-white">Izin</button>
                                <button type="submit" class="btn btn-danger">Sakit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6 col-md-6">
                    <div class="card info-card absen-card">
                        <div class="card-body">
                            <h5 class="card-title">Absensi Pulang</h5>
                            <div class="row">
                                <div class="col-xxl-6 col-md-6"> <input type="date" class="form-control"></div>
                                <div class="col-xxl-6 col-md-6">
                                    <div class="col-sm-12"> <input class="form-control" type="file" id="formFile"></div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-md-12 button-absensi">
                                <button type="submit" class="btn btn-primary">Hadir</button>
                                <button type="submit" class="btn btn-warning text-white">Izin</button>
                                <button type="submit" class="btn btn-danger">Sakit</button>
                            </div>
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
                        <tr>
                            <td>Datang</td>
                            <td>2023-10-25</td>
                            <td>08:00 AM</td>
                            <td>Hadir</td>
                        </tr>
                        <tr>
                            <td>Pulang</td>
                            <td>2023-10-25</td>
                            <td>04:00 PM</td>
                            <td>Hadir</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection