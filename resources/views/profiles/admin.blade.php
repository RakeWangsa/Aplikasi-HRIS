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
                    <div class="btn-profile"> <button class="btn text-white" data-toggle="modal" data-target="#job{{ $row->id }}">{{ $row->job }}</button></div>
                </div>
            </div>
        </div>
        @if($i==4)
        @php($i=0)
            </div>
        @endif
    @php($i++)

    <!-- Modal -->
<div class="modal fade" id="job{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $row->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('updateJob') }}" method="post">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="job">Job:</label>
                <input type="text" class="form-control" id="job" name="job" value="{{ $row->job }}">
                <input type="text" style="display:none" class="form-control" id="id_user" name="id_user" value="{{ $row->id }}" readonly>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
  </div>
</div>

    @endforeach


</section>
@endsection