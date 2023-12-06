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
                <div class="card-body mt-4">
                    <form action="{{ route('filterTimesheet') }}" method="post">
                        @csrf
                        <div class="row mb-4 mt-4">
                            <div class="col-xxl-2 col-md-3">
                                <div class="col-sm-12">
                                    <select id="groupSelect" name="groupBy" class="form-select" aria-label="Default select example" required>
                                        <option value="job" @if(isset($groupBy)) {{ $groupBy == 'job' ? 'selected' : '' }} @endif>Group by job</option>
                                        <option value="employee" @if(isset($groupBy)) {{ $groupBy == 'employee' ? 'selected' : '' }} @endif>Group by employee</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-xxl-2 col-md-3">
                                <div class="col-sm-12">
                                    <select id="optionsSelect" name="filter" class="form-select" aria-label="Default select example" required>
                                        @foreach($employee as $row)
                                            <option value="{{ $row->name }}" @if(isset($filter)) {{ $filter == $row->name ? 'selected' : '' }} @endif>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-2 col-md-3">
                                <input type="date" name="start_date" class="form-control" @if(isset($startDate)) value="{{ $startDate }}" @endif required>
                            </div>
                            <div class="col-xxl-2 col-md-3">
                                <input type="date" name="end_date" class="form-control" @if(isset($endDate)) value="{{ $endDate }}" @endif required>
                            </div>
                            <div class="col-xxl-2 col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class='bi bi-filter'></i> Filter
                                </button>
                            </div>
                            <div class="col-xxl-2 col-md-3">
                                <button class="btn btn-outline-secondary">
                                    <i class='bi bi-download'></i> Export XLS
                                </button>
                            </div>
                        </div>
                    </form>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Job</th>
                                <th scope="col">Task</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($timesheet as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->job }}</td>
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
    // Fungsi untuk mengubah opsi pada elemen kedua berdasarkan pilihan elemen pertama
    function updateOptions() {
        var groupSelect = document.getElementById('groupSelect');
        var optionsSelect = document.getElementById('optionsSelect');
        
        // Bersihkan opsi sebelum menambahkan yang baru
        optionsSelect.innerHTML = '';
        
        // Tambahkan opsi sesuai dengan pilihan elemen pertama
        if (groupSelect.value === 'employee') {
            @foreach($employee as $row)
                optionsSelect.options.add(new Option('{{ $row->name }}', '{{ $row->name }}'));
            @endforeach
        } else if (groupSelect.value === 'job') {
            @foreach($job as $row)
                optionsSelect.options.add(new Option('{{ $row->job }}', '{{ $row->job }}'));
            @endforeach
        }
    }

    // Tambahkan event listener untuk memanggil fungsi ketika pilihan elemen pertama berubah
    document.getElementById('groupSelect').addEventListener('change', updateOptions);

    // Panggil fungsi pertama kali untuk menetapkan opsi awal
    updateOptions();
</script>


@endsection