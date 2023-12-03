@extends('layouts.main')

@section('container')
<style>
    table {
        background-color: white;
        margin-left: 10px;
    }

    .button-absensi {
        margin-bottom: 20px;
        margin-top: 20px;
    }
</style>
<div class="pagetitle mt-3">
    <h1>Penilaian KPI</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Penilaian</li>
            <li class="breadcrumb-item active">KPI</li>
        </ol>
        <!-- Dropdown menu -->
        <div class="dropdown">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Tambah Indikator KPI
            </a>

            <!-- Dropdown items -->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                @foreach($job as $row)
                    <li><button class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{ $row->job }}">{{ $row->job }}</button></li>
                @endforeach

            </ul>
        </div>
    </nav>
</div>

@foreach($job as $row)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $row->job }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $row->job }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('addKPI') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="divisi">Divisi :</label>
                    <input type="text" class="form-control" id="divisi" name="divisi" value="{{ $row->job }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <label for="tanggungjawabpekerjaan">Tanggung Jawab Pekerjaan :</label>
                    <input type="text" class="form-control" id="tanggungjawabpekerjaan" name="tanggungjawabpekerjaan" placeholder="Masukkan Tanggung Jawab Pekerjaan">
                </div>
                <div class="form-group mb-3">
                    <label for="keyperformanceindikator">Key Performance Indikator :</label>
                    <input type="text" class="form-control" id="keyperformanceindikator" name="keyperformanceindikator" placeholder="Masukkan Key Performance Indikator">
                </div>
                <div class="form-group mb-3">
                    <label for="bobot">Bobot :</label>
                    <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Masukkan Bobot">
                </div>
                <div class="form-group mb-3">
                    <label for="target">Target :</label>
                    <input type="text" class="form-control" id="target" name="target" placeholder="Masukkan Target">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
        </div>
    </div>
    </div>
    @endforeach

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggung Jawab Pekerjaan</th>
                            <th scope="col">Key Performance Indikator</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Target</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" rowspan="3">1</th>
                            <td rowspan="3">Mendistribusikan produk-produk panen The Farmhill</td>
                            <td>Waktu pemenuhan barang di outlet max (hari) setelah stock habis</td>
                            <td>9</td>
                            <td>2</td>
                            <td>
                                <a class="btn btn-warning" style="border-radius: 100px;" a href=""><i class="bi bi-pencil-square text-white"></i></a>
                                <a class="btn btn-danger" style="border-radius: 100px;" a href=""><i class="bi bi-trash text-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Waktu penjualan hasil panen max (hari)</td>
                            <td>9</td>
                            <td>2</td>
                            <td>
                                <a class="btn btn-warning" style="border-radius: 100px;" a href=""><i class="bi bi-pencil-square text-white"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>% tingkat keberhasilan promo yang dibuat min</td>
                            <td>6</td>
                            <td>7</td>
                            <td>
                                <a class="btn btn-warning" style="border-radius: 100px;" a href=""><i class="bi bi-pencil-square text-white"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection