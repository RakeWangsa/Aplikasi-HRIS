@extends('layouts.main')

@section('container')

<div class="pagetitle mt-3">
    <h1>Penilaian OKR</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Penilaian</li>
            <li class="breadcrumb-item active">OKR</li>
        </ol>
    </nav>
</div>

<style>
    .container {
        margin: 0;
        padding: 0;
    }

    .icon-button {
        border-style: none;
        background-color: white;
    }

    .table-bordered {
        background: white;
    }
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleIcon(iconId) {
        const icon = document.getElementById(iconId);
        if (icon.classList.contains('bi-arrow-right-square')) {
            icon.classList.remove('bi-arrow-right-square');
            icon.classList.add('bi-arrow-down-square');
        } else {
            icon.classList.remove('bi-arrow-down-square');
            icon.classList.add('bi-arrow-right-square');
        }
    }

    function toggleAllLists() {
        const collapsibleButtons = document.querySelectorAll('.list-group-item-action button');
        collapsibleButtons.forEach(button => {
            if (!button.getAttribute('aria-expanded') || button.getAttribute('aria-expanded') === 'false') {
                button.click();
            } else {
                button.click();
            }
        });
    }
</script>

<!-- <div class="container">
    <button onclick="toggleAllLists()" class="btn btn-primary mb-2">OKR KBL</button>
    <table class="table table-bordered">
        <thead>
            <th scope="col">OKR</th>
            <th scope="col">Status</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <button class="icon-button" data-toggle="collapse" href="#list1" onclick="toggleIcon('icon1')">
                        <i id="icon1" class="bi bi-arrow-right-square"></i>
                    </button>
                    Mencapai Profit 24 M
                </td>
                <td><span class="badge bg-success">Tercapai</span></td>
            </tr>
            <tr>
                <td>
                    <div id="list1" class="collapse">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <button class="icon-button" data-toggle="collapse" href="#sublist1" onclick="toggleIcon('icon2')">
                                            <i id="icon2" class="bi bi-arrow-right-square"></i>
                                        </button>
                                        Menjadi market leader penyedia produk buah dan sayur di Indonesia
                                    </td>
                                    <td><span class="badge bg-warning">Pending</span></td>

                                </tr>
                                <tr>
                                    <td>
                                        <div id="sublist1" class="collapse">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Minimal 60% produk ada di seluruh Indonesia</td>
                                                        <td><span class="badge bg-danger">Rejected</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Produk masuk ke segala jenis pasar dengan daya beli yang berbeda-beda (low-end, middle-end, and high-end)</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Menjalin kerja sama dengan minimal 5 mitra per bulan</td>
                                                        <td><span class="badge bg-success">Tercapai</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Survei kepercayaan & kepuasan pelanggan minimal 95% positif</td>
                                                        <td><span class="badge bg-success">Tercapai</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="icon-button" data-toggle="collapse" href="#sublist2" onclick="toggleIcon('icon3')">
                                            <i id="icon3" class="bi bi-arrow-right-square"></i>
                                        </button>
                                        Peningkatan brand awareness
                                    </td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="sublist2" class="collapse">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Peningkatan brand awareness pada end user 2% - 5% setiap bulan</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Peningkatan jumlah account reach di media sosial official The Farmhill 10% per bulan</td>
                                                        <td><span class="badge bg-success">Tercapai</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Upload minimal 12 konten di media sosial official The Farmhill per minggu</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="icon-button" data-toggle="collapse" href="#sublist3" onclick="toggleIcon('icon4')">
                                            <i id="icon4" class="bi bi-arrow-right-square"></i>
                                        </button>
                                        Meningkatkan angka penjualan
                                    </td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="sublist3" class="collapse">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Peningkatan persentase PO Outlet existing 10% per bulan</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Peningkatan harga produk minimal 10% per tahun</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Peningkatan jumlah pelanggan minimal 10% per tahun </td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="icon-button" data-toggle="collapse" href="#sublist4" onclick="toggleIcon('icon5')">
                                            <i id="icon5" class="bi bi-arrow-right-square"></i>
                                        </button>
                                        Provide best product
                                    </td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="sublist4" class="collapse">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Jumlah retur dibawah 5%</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> 90% jumlah populasi tanaman per greenhouse sehat</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> 85% tanaman terbebas dari OPT</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Tingkat keberhasilan pemberian nutrisi AB mix terhadap pertumbuhan tanaman minimal 95%</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="icon-button" data-toggle="collapse" href="#sublist5" onclick="toggleIcon('icon6')">
                                            <i id="icon6" class="bi bi-arrow-right-square"></i>
                                        </button>
                                        Mengoptimalkan kinerja karyawan
                                    </td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div id="sublist5" class="collapse">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Penambahan jumlah biilitas/properti yang menunjang efektifitas dan efisiensi kinerja</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Upgrading skill karyawan dengan program pelatihan minimal 1 tahun sekali</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Penilaian kinerja rutin setiap kuartal berdasarkan pencapaian OKR dan KPI</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="bi bi-arrow-right-square"></i> Mengadakan program kultural minimal 4 kali dalam 1 bulan</td>
                                                        <td><span class="badge bg-warning">Pending</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div> -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<div class="container">
    <ul class="list-group">
        <li class="list-group-item text-center">
            <div class="row">
                <div class="col-xxl-10 col-md-10">
                    OKR KBL
                </div>
                <div class="col-xxl-2 col-md-2 text-center">
                    Status
                </div>
            </div>
        </li>
        <li class="list-group-item list-group-item-action">
            <div class="row">
                <div class="col-xxl-10 col-md-10">
                    <button class="icon-button" data-toggle="collapse" href="#list1" onclick="toggleIcon('icon1')">
                        <i id="icon1" class="bi bi-arrow-right-square"></i>
                    </button>
                    Mencapai Profit 24 M
                </div>
                <div class="col-xxl-2 col-md-2 text-center">
                    <td><span class="badge bg-warning">Pending</span></td>
                </div>
            </div>
        </li>
        <div id="list1" class="collapse">
            <ul class="list-group list-group-flush">
                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-xxl-10 col-md-10">
                            <button class="icon-button" data-toggle="collapse" href="#sublist1-1" onclick="toggleIcon('icon1-1')" style="margin-left:10px">
                                <i id="icon1-1" class="bi bi-arrow-right-square"></i>
                            </button>
                            Menjadi market leader penyedia produk buah dan sayur di Indonesia
                        </div>
                        <div class="col-xxl-2 col-md-2 text-center">
                            <td><span class="badge bg-warning">Pending</span></td>
                        </div>
                    </div>
                </li>
                <div id="sublist1-1" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Minimal 60% produk ada di seluruh Indonesia
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Produk masuk ke segala jenis pasar dengan daya beli yang berbeda-beda (ow-end, middle-end, and high-end)
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Menjalin kerja sama dengan minimal 5 mitra per bulan
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Survei kepercayaan & kepuasan pelanggan minimal 95% positif
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-xxl-10 col-md-10">
                            <button class="icon-button" data-toggle="collapse" href="#sublist2" onclick="toggleIcon('icon2')" style="margin-left:10px">
                                <i id="icon2" class="bi bi-arrow-right-square"></i>
                            </button>
                            Peningkatan brand awareness
                        </div>
                        <div class="col-xxl-2 col-md-2 text-center">
                            <td><span class="badge bg-warning">Pending</span></td>
                        </div>
                    </div>
                </li>
                <div id="sublist2" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Peningkatan brand awareness pada end user 2% - 5% setiap bulan
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist2" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Peningkatan jumlah account reach di media sosial official The Farmhill 10% per bulan
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-success">Tercapai</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist2" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Upload minimal 12 konten di media sosial official The Farmhill per minggu
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-xxl-10 col-md-10">
                            <button class="icon-button" data-toggle="collapse" href="#sublist3" onclick="toggleIcon('icon3')" style="margin-left:10px">
                                <i id="icon3" class="bi bi-arrow-right-square"></i>
                            </button>
                            Meningkatkan angka penjualan
                        </div>
                        <div class="col-xxl-2 col-md-2 text-center">
                            <td><span class="badge bg-warning">Pending</span></td>
                        </div>
                    </div>
                </li>
                <div id="sublist3" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Peningkatan persentase PO Outlet existing 10% per bulan
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist3" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Peningkatan harga produk minimal 10% per tahun
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-success">Tercapai</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist3" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Peningkatan jumlah pelanggan minimal 10% per tahun
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-xxl-10 col-md-10">
                            <button class="icon-button" data-toggle="collapse" href="#sublist4" onclick="toggleIcon('icon4')" style="margin-left:10px">
                                <i id="icon4" class="bi bi-arrow-right-square"></i>
                            </button>
                            Provide best product
                        </div>
                        <div class="col-xxl-2 col-md-2 text-center">
                            <td><span class="badge bg-warning">Pending</span></td>
                        </div>
                    </div>
                </li>
                <div id="sublist4" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Jumlah retur dibawah 5%
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist4" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> 90% jumlah populasi tanaman per greenhouse sehat
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist4" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> 85% tanaman terbebas dari OPT
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist4" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Tingkat keberhasilan pemberian nutrisi AB mix terhadap pertumbuhan tanaman minimal 95%
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-success">Tercapai</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <li class="list-group-item list-group-item-action">
                    <div class="row">
                        <div class="col-xxl-10 col-md-10">
                            <button class="icon-button" data-toggle="collapse" href="#sublist5" onclick="toggleIcon('icon5')" style="margin-left:10px">
                                <i id="icon5" class="bi bi-arrow-right-square"></i>
                            </button>
                            Mengoptimalkan kinerja karyawan
                        </div>
                        <div class="col-xxl-2 col-md-2 text-center">
                            <td><span class="badge bg-warning">Pending</span></td>
                        </div>
                    </div>
                </li>
                <div id="sublist5" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Penambahan jumlah fasilitas/properti yang menunjang efektifitas dan efisiensi kinerja
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist5" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Upgrading skill karyawan dengan program pelatihan minimal 1 tahun sekali
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist5" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Penilaian kinerja rutin setiap kuartal berdasarkan pencapaian OKR dan KPI
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="sublist5" class="collapse">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-xxl-10 col-md-10">
                                    <i class="bi bi-arrow-right-circle" style="margin-left:50px"></i> Mengadakan program kultural minimal 4 kali dalam 1 bulan
                                </div>
                                <div class="col-xxl-2 col-md-2 text-center">
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </ul>
</div>

@endsection