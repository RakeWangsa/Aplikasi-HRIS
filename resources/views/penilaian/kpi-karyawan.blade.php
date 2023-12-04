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
                    <table class="table table-bordered mt-4">
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

                            @if(isset($kpi))
                            @php($i = 1)
                            @foreach($kpi as $index => $row)
                                <tr>
                                    @if ($index == 0 || $row->tanggung_jawab_pekerjaan != $kpi[$index - 1]->tanggung_jawab_pekerjaan)
                                        @php($rowspan = $kpi->where('tanggung_jawab_pekerjaan', $row->tanggung_jawab_pekerjaan)->count())
                                        <th rowspan="{{ $rowspan }}">{{ $i++ }}</th>
                                        <td rowspan="{{ $rowspan }}">{{ $row->tanggung_jawab_pekerjaan }}</td>
                                    @endif
                                    <td>{{ $row->key_performance_indikator }}</td>
                                    <td>{{ $row->bobot }}</td>
                                    <td>{{ $row->target }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a class="btn btn-warning" style="border-radius: 100px;" data-toggle="modal" data-target="#update{{ $row->id }}"><i class="bi bi-pencil-square text-white"></i></a>
                                    </td>
                                </tr>
    
                                <!-- Modal -->
                                <div class="modal fade" id="update{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update KPI</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form action="{{ route('updateKPI', ['id' => $row->id]) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="update_tanggung_jawab_pekerjaan">Tanggung Jawab Pekerjaan:</label>
                                                    <input type="text" class="form-control" id="update_tanggung_jawab_pekerjaan" name="update_tanggung_jawab_pekerjaan" value="{{ $row->tanggung_jawab_pekerjaan }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="update_key_performance_indikator">Key Performance Indikator:</label>
                                                    <input type="text" class="form-control" id="update_key_performance_indikator" name="update_key_performance_indikator" value="{{ $row->key_performance_indikator }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="update_bobot">Bobot:</label>
                                                    <input type="text" class="form-control" id="update_bobot" name="update_bobot" value="{{ $row->bobot }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="update_target">Target:</label>
                                                    <input type="text" class="form-control" id="update_target" name="update_target" value="{{ $row->target }}">
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
                            @endif

                            {{-- <tr>
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
                            </tr> --}}
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