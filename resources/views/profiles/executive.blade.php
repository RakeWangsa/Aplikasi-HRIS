@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
    <h1>Daftar Karyawan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/executive/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Daftar Karyawan</li>
        </ol>
    </nav>
</div>
<section class="section profile">
    <div class="row">
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/aul.jpg')}}" alt="Profile" class="rounded-circle">
                    <h2>Auliya Putri</h2>
                    <div class="btn-profile"> <button class="btn text-white">Developer</button></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/people.png')}}" alt="Profile" class="rounded-circle">
                    <h2>Mark Lee</h2>
                    <div class="btn-profile"> <button class="btn text-white">Actor</button></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/people.png')}}" alt="Profile" class="rounded-circle">
                    <h2>Selena Gomez</h2>
                    <div class="btn-profile"> <button class="btn text-white">Singer</button></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/people.png')}}" alt="Profile" class="rounded-circle">
                    <h2>Hailey Bieber</h2>
                    <div class="btn-profile"> <button class="btn text-white">Model</button></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/people.png')}}" alt="Profile" class="rounded-circle">
                    <h2>Aliyah Zulfa</h2>
                    <div class="btn-profile"> <button class="btn text-white">Arsitek</button></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/people.png')}}" alt="Profile" class="rounded-circle">
                    <h2>Fajar Sakti</h2>
                    <div class="btn-profile"> <button class="btn text-white">Electrical</button></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/people.png')}}" alt="Profile" class="rounded-circle">
                    <h2>Finna Saraswati</h2>
                    <div class="btn-profile"> <button class="btn text-white">Designer</button></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('admintemplate/img/people.png')}}" alt="Profile" class="rounded-circle">
                    <h2>Imam Chasan</h2>
                    <div class="btn-profile"> <button class="btn text-white">Teknisi Mesin</button></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card-body-pagination">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>
@endsection