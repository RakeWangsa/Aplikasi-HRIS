@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
    <h1>Management User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Daftar Pengguna</li>
        </ol>
        <!-- Dropdown menu -->
        <div class="dropdown">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Tambah Pengguna
            </a>

            <!-- Dropdown items -->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="/tambahUser/karyawan">Karyawan</a></li>
                <li><a class="dropdown-item" href="/tambahUser/executive">Executive User</a></li>
                <li><a class="dropdown-item" href="/tambahUser/admin">Admin</a></li>
            </ul>
        </div>
    </nav>
</div>

<style>
    .dropdown-menu .dropdown-item {
        background-color: #F3F3F2;
        border-radius: 0 0 0 0;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: #FFF;
        border-radius: 0 0 0 0;
    }

    .table-container {
        max-height: 200px;
        overflow-y: scroll;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #c3c3c3;
        position: sticky;
        top: 0;
    }
</style>

<div class="row">
    <div class="card col-md-12 mt-2 pb-4">
        <div class="card-body">
            <h5 class="card-title">Daftar Karyawan</h5>
            <div class="table-container border">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no=1)
                        @if(count($karyawan) > 0)
                        @foreach($karyawan as $item)
                        <tr>
                            <td scope="row">{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a class="btn btn-warning" style="border-radius: 100px;" a href="{{ route('editUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-pencil-square text-white"></i></a>
                                <a class="btn btn-danger" style="border-radius: 100px;" onclick=return confirm('Apakah anda yakin?')" a href="{{ route('hapusUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada user</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card col-md-12 mt-2 pb-4">
        <div class="card-body">
            <h5 class="card-title">Daftar Executive User</h5>
            <div class="table-container border">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php($no=1)
                        @if(count($executive) > 0)
                        @foreach($executive as $item)
                        <tr>
                            <td scope="row">{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a class="btn btn-warning" style="border-radius: 100px;" a href="{{ route('editUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-pencil-square text-white"></i></a>
                                <a class="btn btn-danger" style="border-radius: 100px;" onclick=return confirm('Apakah anda yakin?')" a href="{{ route('hapusUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada user</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card col-md-12 mt-2 pb-4">
        <div class="card-body">
            <h5 class="card-title">Daftar Admin</h5>
            <div class="table-container border">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no=1)
                        @if(count($admin) > 0)
                        @foreach($admin as $item)
                        <tr>
                            <td scope="row">{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <a class="btn btn-warning" style="border-radius: 100px;" a href="{{ route('editUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-pencil-square text-white"></i></a>
                                <a class="btn btn-danger" style="border-radius: 100px;" onclick=return confirm('Apakah anda yakin?')" a href="{{ route('hapusUser', ['id' => base64_encode($item->id)]) }}"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada user</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection