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
                                    <select id="groupSelect" class="form-select" aria-label="Default select example">
                                        <option value="job">Group by job</option>
                                        <option value="employee">Group by employee</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-xxl-3 col-md-3">
                                <div class="col-sm-12">
                                    <select id="optionsSelect" class="form-select" aria-label="Default select example">
                                        @foreach($employee as $row)
                                            <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-xxl-3 col-md-3">
                                <input type="date" class="form-control">
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
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>Developers</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>rake wangsa</td>
                                <td>Developer</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>Developer</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>dfg</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>fds</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>Rakev Tionardi</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>aulia kafita putri</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>asd</td>
                            </tr>
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

<script>
    // Mendengarkan perubahan pada elemen kedua
    document.getElementById('optionsSelect').addEventListener('change', function() {
        filterTable();
    });

    // Fungsi untuk menyaring tabel berdasarkan nilai elemen kedua
    function filterTable() {
        var selectedValue = document.getElementById('optionsSelect').value;

        // Mendapatkan semua baris dalam tabel
        var rows = document.querySelectorAll('.datatable tbody tr');

        // Menyembunyikan semua baris
        rows.forEach(function(row) {
            row.style.display = 'none';
        });

        // Menampilkan hanya baris yang sesuai dengan nilai elemen kedua
        rows.forEach(function(row) {
            var cells = row.getElementsByTagName('td');
            var name = cells[0].innerText; // Mengambil nilai pada kolom "Name"

            if (name === selectedValue) {
                row.style.display = '';
            }
        });
    }
</script>

@endsection