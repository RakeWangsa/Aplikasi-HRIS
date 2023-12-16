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
    <h1>Hasil Penilaian KPI ( {{ $jenis }} : {{ $filter }} )</h1>
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



                            
                            @foreach ($data as $item)
                            <div class="mt-4"><strong>{{ $item['nama'] }}</strong></div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($no = 1)
                                    @foreach ($item['kpi'] as $kpiItem)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $kpiItem->tanggung_jawab_pekerjaan }}</td>
                                        <td>{{ $kpiItem->key_performance_indikator }}</td>
                                        <td>{{ $kpiItem->bobot }}</td>
                                        <td>{{ $kpiItem->target }}</td>
                                        <td>{{ $kpiItem->realisasi }}</td>
                                    <td>{{ $kpiItem->score }}</td>
                                    <td>{{ $kpiItem->nilai_akhir }}</td>
                                    <td><a href="{{ asset('img/'.$kpiItem->sumber) }}" target="_blank">{{ $kpiItem->sumber }}</a></td>
                                    </tr>
                                @endforeach
                                    <tr>
                                        <td colspan="7">Total Nilai Akhir</td>
                                        <td colspan="2">{{ $item['totalNilaiAkhir'] }}</td>
                                    </tr>
        
        
                                </tbody>
                            </table>
                        @endforeach


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
@endsection