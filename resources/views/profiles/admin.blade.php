@extends('layouts.main')

@section('container')
<div class="pagetitle mt-3">
    <h1>Profiles</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Profiles</li>
        </ol>
    </nav>
</div>
<section class="section profile">

    @php($i=1)
    @foreach($users as $row)
        @if($i==1)
            <div class="row">
        @endif
        <div class="col-xxl-3 col-md-3">
            <div class="card">
                <div class="card-body profiles-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{ asset('img/' . $row->image) }}" alt="Profile" class="rounded-circle">
                    <h2>{{ $row->name }}</h2>
                    <div class="btn-profile"> <button class="btn text-white">{{ $row->job }}</button></div>
                </div>
            </div>
        </div>
        @if($i==4)
        @php($i=0)
            </div>
        @endif
    @php($i++)
    @endforeach


</section>
@endsection