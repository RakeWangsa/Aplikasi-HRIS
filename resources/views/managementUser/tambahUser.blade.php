@extends('layouts.main')

@section('container')
<style>
    .form {
        margin-top: 10px;
    }
</style>
<div class="pagetitle mt-3">
    <h1>Tambah User</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    </nav>
</div>
<section class="section dashboard">
    <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="mt-4">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <form action="/tambahUser" method="post">
                    @csrf
                    <div class="form">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control rounded-top 
                               @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control
                               @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control rounded-bottom
                               @error('password') is-invalid @enderror" id="password" placeholder="Password" required value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form">
                        <label for="level">Level</label>
                        <input type="text" name="level" class="form-control rounded-bottom" id="level" required value="{{ $level }}" readonly>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="text-left mb-5 mt-4"> <a class="btn btn-danger" href="/user/management">Batal</a><button type="submit" class="btn btn-primary ms-2">Submit</button></div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection