@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
    <h1>Task Timesheet</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Timesheet</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('addTask') }}">
                        @csrf
                        <div class="row my-4">
                            <div class="col-xxl-5 col-md-3">
                                <input type="text" class="form-control" name="task" placeholder="Tambah Jenis Task" required>
                            </div>
                            <div class="col-xxl-5 col-md-3">
                                <input type="text" class="form-control" name="divisi" placeholder="Divisi" required>
                            </div>
                            <div class="col-xxl-2 col-md-3 button-timesheet">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Jenis Task</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach($task as $row)
                            <tr>
                                <td scope="row">{{ $no++ }}</td>
                                <td>{{ $row->divisi }}</td>
                                <td>{{ $row->jenis_task }}</td>
                                <td><a href="{{ route('deleteTask', ['id' => encrypt($row->id)]) }}" onclick="return confirm('Apakah Anda yakin?')"><span class='bx bxs-trash bx-border-circle bg-danger text-white'></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection