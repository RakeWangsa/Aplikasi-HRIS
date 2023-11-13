@extends('layouts.main')

@section('container')
<style>
    table {
        background-color: white;
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
            <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Penilaian</li>
            <li class="breadcrumb-item active">KPI</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row mb-3 mt-4">
                            <div class="col-xxl-3 col-md-3">
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Jobdesk</option>
                                        <option value="1">Mendistribusikan produk-produk panen The Farmhill</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pilih KPI</option>
                                        <option value="1">Waktu pemenuhan barang di outlet max (hari) setelah stock habis</option>
                                        <option value="2">Waktu penjualan hasil panen max (hari)</option>
                                        <option value="3">% tingkat keberhasilan promo yang dibuat min</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <div class="col-sm-12"> <input class="form-control" type="file" id="formFile"></div>
                            </div>
                            <div class="col-xxl-3 col-md-3 button-timesheet">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggung Jawab Pekerjaan</th>
                                <th scope="col">Key Performance Indikator</th>
                                <th scope="col">Bobot</th>
                                <th scope="col">Target</th>
                                <th scope="col">Realisasi</th>
                                <th scope="col">Score</th>
                                <th scope="col">Nilai Akhir</th>
                                <th scope="col">Sumber Dokumen Penilaian</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Draft laporan pemenuhan barang</td>
                                <td>
                                    <a class="btn btn-warning" style="border-radius: 100px;" a href=""><i class="bi bi-pencil-square text-white"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Waktu penjualan hasil panen max (hari)</td>
                                <td>9</td>
                                <td>2</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Draft hasil panen</td>
                                <td>
                                    <a class="btn btn-warning" style="border-radius: 100px;" a href=""><i class="bi bi-pencil-square text-white"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>% tingkat keberhasilan promo yang dibuat min</td>
                                <td>6</td>
                                <td>7</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Draft pembayaran</td>
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
    </div>
</section>
@endsection