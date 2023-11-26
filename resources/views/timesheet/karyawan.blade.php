@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
    <h1>Timesheet</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Timesheet</li>
        </ol>
    </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="myForm" action="{{ route('submitTimesheet') }}" method="post">
                        @csrf
                        <div class="row mb-3 mt-4">
                            <div class="col-xxl-8 col-md-8"> <input type="text" class="form-control" name="task" placeholder="What are you working on?" required></div>
                            <div class="col-xxl-4 col-md-4">
                                <div class="col-sm-12">
                                    <select id="taskSelect" class="form-select" name="category" aria-label="Default select example" required>
                                        <option selected disabled>Select task</option>
                                        @foreach($task as $row)
                                            <option value="{{ $row->jenis_task }}">{{ $row->jenis_task }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xxl-3 col-md-3"> <input type="date" name="date" class="form-control" placeholder="Applies on" required></div>

                            <div class="col-xxl-3 col-md-3"> <input type="time" name="start_time" class="form-control" placeholder="Start time" required></div>

                            <div class="col-xxl-3 col-md-3"> <input type="time" name="end_time" class="form-control" placeholder="End time" required></div>

                            <div class="col-xxl-3 col-md-3 button-timesheet">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Task</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no=1)
                            @foreach($timesheet as $row)
                            <tr>
                                <td scope="row">{{ $no++ }}</td>
                                <td>{{ $row->task }}</td>
                                <td>{{ $row->category }}</td>
                                <td>{{ $row->date }}</td>
                                <td>{{ $row->start_time }}</td>
                                <td>{{ $row->end_time }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('myForm').addEventListener('submit', function (event) {
        var selectElement = document.getElementById('taskSelect');
        var selectedValue = selectElement.value;

        // Periksa apakah opsi yang dipilih adalah opsi pertama (disabled)
        if (selectedValue === selectElement.options[0].value) {
            alert('Pilih task selain opsi pertama.');
            event.preventDefault(); // Mencegah pengiriman formulir jika tidak valid
        }
    });
</script>
@endsection