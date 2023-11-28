@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
    <h1>Timesheet</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/executive/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Timesheet</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row mb-4 mt-4">
                            <div class="col-xxl-3 col-md-3">
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">Group by task</option>
                                        <option value="2">Group by employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example">
                                        @foreach($employee as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example">
                                        @foreach($job as $row)
                                            <option value="{{ $row->job }}">{{ $row->job }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-xxl-3 col-md-3">
                                <input type="date" class="form-control">
                            </div> --}}
                            <div class="col-xxl-3 col-md-3">
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <button type="submit" class="btn btn-outline-secondary">
                                    <i class='bi bi-download'></i> Export XLS
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Project</th>
                                <th scope="col">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>No Project</td>
                                <td>00:00:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection