@extends('layouts.main')

@section('container')
@if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif
<div class="pagetitle mt-3">
    <h1>My Profile</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/employee/dashboard">Home</a></li>
            <li class="breadcrumb-item active">My Profile</li>
        </ol>
    </nav>
</div>
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="{{asset('img/' . $user->image)}}" alt="Profile" class="rounded-circle">
                    <h2>{{ auth()->user()->name }}</h2>
                    <h3>{{ ['admin' => 'Administrator', 'karyawan' => 'Karyawan', 'executive' => 'Executive User'][auth()->user()->level] }}</h3>
                    <div class="social-links mt-2"> <a href="#" class="twitter"><i class="bi bi-twitter"></i></a> <a href="#" class="facebook"><i class="bi bi-facebook"></i></a> <a href="#" class="instagram"><i class="bi bi-instagram"></i></a> <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a></div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item"> <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button></li>
                        <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button></li>
                        <li class="nav-item"> <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button></li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">About</h5>
                            <p class="small fst-italic">{{ $user->about }}</p>
                            <h5 class="card-title">Profile Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Company</div>
                                <div class="col-lg-9 col-md-8">{{ $user->company }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Job</div>
                                <div class="col-lg-9 col-md-8">{{ $user->job }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Country</div>
                                <div class="col-lg-9 col-md-8">{{ $user->country }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Address</div>
                                <div class="col-lg-9 col-md-8">{{ $user->address }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Phone</div>
                                <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e982c788878d8c9b9a8687a98c91888499858cc78a8684">{{ $user->email }}</a></div>
                            </div>
                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                            <form action="{{ route('changeImage') }}" method="post" enctype="multipart/form-data" id="updateImage">
                                @csrf
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="{{asset('img/' . $user->image)}}" alt="Profile">
                                        <input type="file" name="profileImage" id="fileInput" accept="image/*" style="display: none;">
                                        <div class="pt-2"> <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" onclick="document.getElementById('fileInput').click();">
                                            <i class="bi bi-upload"></i>
                                        </a> <a href="{{ route('deleteImage') }}" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a></div>
                                    </div>
                                </div>
                            </form>

                            <form action="{{ route('editProfile') }}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                                    <div class="col-md-8 col-lg-9"> <input name="fullName" type="text" class="form-control" id="fullName" value="{{ $user->name }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                    <div class="col-md-8 col-lg-9"><textarea name="about" class="form-control" id="about" style="height: 100px" required>{{ $user->about }}</textarea></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                                    <div class="col-md-8 col-lg-9"> <input name="company" type="text" class="form-control" id="company" value="{{ $user->company }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                                    <div class="col-md-8 col-lg-9"> <input name="job" type="text" class="form-control" id="Job" value="{{ $user->job }}" readonly></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                    <div class="col-md-8 col-lg-9"> <input name="country" type="text" class="form-control" id="Country" value="{{ $user->country }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                    <div class="col-md-8 col-lg-9"> <input name="address" type="text" class="form-control" id="Address" value="{{ $user->address }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                    <div class="col-md-8 col-lg-9"> <input name="phone" type="text" class="form-control" id="Phone" value="{{ $user->phone }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9"> <input name="email" type="email" class="form-control" id="Email" value="{{ $user->email }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                                    <div class="col-md-8 col-lg-9"> <input name="twitter" type="text" class="form-control" id="Twitter" value="{{ $user->twitter }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                                    <div class="col-md-8 col-lg-9"> <input name="facebook" type="text" class="form-control" id="Facebook" value="{{ $user->facebook }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                                    <div class="col-md-8 col-lg-9"> <input name="instagram" type="text" class="form-control" id="Instagram" value="{{ $user->instagram }}" required></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                                    <div class="col-md-8 col-lg-9"> <input name="linkedin" type="text" class="form-control" id="Linkedin" value="{{ $user->linkedin }}" required></div>
                                </div>
                                <div class="btn-save"> <button type="submit" class="btn btn-primary">Save Changes</button></div>
                            </form>
                        </div>

                        <div class="tab-pane fade pt-3" id="profile-change-password">
                            <form action="{{ route('changePassword') }}" method="post" id="changePasswordForm">
                                @csrf
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9"> <input name="password" type="password" class="form-control" id="currentPassword"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9"> <input name="newpassword" type="password" class="form-control" id="newPassword"></div>
                                </div>
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9"> <input name="renewpassword" type="password" class="form-control" id="renewPassword"></div>
                                </div>
                                <div class="text-center mb-4"> <button type="submit" class="btn btn-primary">Change Password</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var form = document.getElementById('changePasswordForm');

        form.addEventListener('submit', function (event) {
            var newPassword = form.querySelector('input[name="newpassword"]').value;
            var renewPassword = form.querySelector('input[name="renewpassword"]').value;

            if (newPassword !== renewPassword) {
                alert('New Password and Re-enter New Password must match.');
                event.preventDefault(); // Mencegah formulir disubmit jika password tidak sesuai
            }
        });
    });
</script>

<script>
    document.getElementById('fileInput').addEventListener('change', function () {
        document.getElementById('updateImage').submit();
    });
</script>

@endsection