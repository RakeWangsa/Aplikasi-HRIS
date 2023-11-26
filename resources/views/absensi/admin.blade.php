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
</style>
<div class="pagetitle mt-3">
    <h1>Absensi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Daftar Absensi</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Absensi</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Bukti Hadir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no=1)
                        @foreach($absensi as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->absensi }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>
                            <td>{{ $row->time }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td>File</td>
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
@endsection