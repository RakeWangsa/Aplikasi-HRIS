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
    <div class="d-flex justify-content-between">
        <h1>Absensi</h1>

        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
            <i class='bx bxs-cog'></i> Setting
        </button>

          <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Setting Batas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('settingBatasAbsen') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group mb-3">
                    <label for="batas_awal_datang">Batas Awal Datang :</label>
                    <input type="time" class="form-control" id="batas_awal_datang" name="batas_awal_datang" value="{{ $setting->batas_awal_datang }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="batas_akhir_datang">Batas Akhir Datang :</label>
                    <input type="time" class="form-control" id="batas_akhir_datang" name="batas_akhir_datang" value="{{ $setting->batas_akhir_datang }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="batas_awal_pulang">Batas Awal Pulang :</label>
                    <input type="time" class="form-control" id="batas_awal_pulang" name="batas_awal_pulang" value="{{ $setting->batas_awal_pulang }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="batas_akhir_pulang">Batas Akhir Pulang :</label>
                    <input type="time" class="form-control" id="batas_akhir_pulang" name="batas_akhir_pulang" value="{{ $setting->batas_akhir_pulang }}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
      </div>
    </div>
  </div>
    </div>

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
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->absensi }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->date)->format('d-m-Y') }}</td>
                            <td>{{ $row->time }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#gambarModal{{$row->file}}">
                                    <img src="{{ asset('img/' . $row->file) }}" alt="Gambar" style="width:50px;height:auto">
                                </a>    
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="gambarModal{{$row->file}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Hadir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('img/' . $row->file) }}" alt="Gambar" style="width:100%;height:auto">
                                        </div>
                                    </div>
                                </div>
                            </div>

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