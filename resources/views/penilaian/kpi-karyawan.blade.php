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
                                        <form action="{{ route('isiKPI') }}" method="post">
                                            @csrf
                                            <input type="text" class="form-control" style="display:none" id="id_kpi_admin" name="id_kpi_admin" value="{{ $row->id }}">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="realisasi">Realisasi:</label>
                                                    <input type="text" class="form-control" id="realisasi" name="realisasi">
                                                </div>
                                                <div class="form-group">
                                                    <label for="score">Score:</label>
                                                    <input type="text" class="form-control" id="score" name="score">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sumber">Sumber Dokumen Penilaian:</label>
                                                    <input type="file" class="form-control" id="sumber" name="sumber">
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