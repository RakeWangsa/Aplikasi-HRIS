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
        <div class="d-flex justify-content-between">
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(isset($divisi)) {{ $divisi }} @else Pilih Divisi @endif
                </a>
        
                <!-- Dropdown items -->
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($job as $row)
                        <li><a class="dropdown-item" href="{{ route('kpi_admin_filter', ['divisi' => $row->job]) }}">{{ $row->job }}</a></li>
                    @endforeach
                </ul>
            </div>
            
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
                    <label for="tanggung_jawab_pekerjaan">Tanggung Jawab Pekerjaan :</label>
                    <input type="text" class="form-control" id="tanggung_jawab_pekerjaan" name="tanggung_jawab_pekerjaan" placeholder="Masukkan Tanggung Jawab Pekerjaan">
                </div>
                <div class="form-group mb-3">
                    <label for="key_performance_indikator">Key Performance Indikator :</label>
                    <input type="text" class="form-control" id="key_performance_indikator" name="key_performance_indikator" placeholder="Masukkan Key Performance Indikator">
                </div>
                <div class="form-group mb-3">
                    <label for="bobot">Bobot :</label>
                    <input type="number" class="form-control" id="bobot" name="bobot" placeholder="Masukkan Bobot">
                </div>
                <div class="form-group mb-3">
                    <label for="target">Target :</label>
                    <input type="number" class="form-control" id="target" name="target" placeholder="Masukkan Target">
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
                                <td>
                                    <a class="btn btn-warning" style="border-radius: 100px;" data-toggle="modal" data-target="#update{{ $row->id }}"><i class="bi bi-pencil-square text-white"></i></a>
                                    <a class="btn btn-danger" style="border-radius: 100px;" a href="{{ route('hapusKPI', ['id' => $row->id]) }}"><i class="bi bi-trash text-white"></i></a>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection