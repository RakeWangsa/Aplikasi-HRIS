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
                    <form>
                        <div class="row mb-3 mt-4">
                            <div class="col-xxl-8 col-md-8"> <input type="text" class="form-control" placeholder="What are you working on?"></div>
                            <div class="col-xxl-4 col-md-4">
                                <div class="col-sm-12">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select task</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-xxl-3 col-md-3"> <input type="date" class="form-control" placeholder="Applies on"></div>

                            <div class="col-xxl-3 col-md-3"> <input type="time" class="form-control" placeholder="Start time"></div>

                            <div class="col-xxl-3 col-md-3"> <input type="time" class="form-control" placeholder="End time"></div>

                            <div class="col-xxl-3 col-md-3 button-timesheet">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-secondary">Cancel</button>
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
                            <tr>
                                <td scope="row">1</td>
                                <td>Membuat timeline</td>
                                <td>Timeline</td>
                                <td>2023-10-25</td>
                                <td>10:00 AM</td>
                                <td>11:00 AM</td>
                            </tr>
                            <tr>
                                <td scope="row">2</td>
                                <td>Membuat timeline</td>
                                <td>Timeline</td>
                                <td>2023-10-25</td>
                                <td>10:00 AM</td>
                                <td>11:00 AM</td>
                            </tr>
                            <tr>
                                <td scope="row">3</td>
                                <td>Membuat timeline</td>
                                <td>Timeline</td>
                                <td>2023-10-25</td>
                                <td>10:00 AM</td>
                                <td>11:00 AM</td>
                            </tr>
                            <tr>
                                <td scope="row">4</td>
                                <td>Membuat timeline</td>
                                <td>Timeline</td>
                                <td>2023-10-25</td>
                                <td>10:00 AM</td>
                                <td>11:00 AM</td>
                            </tr>
                            <tr>
                                <td scope="row">5</td>
                                <td>Membuat timeline</td>
                                <td>Timeline</td>
                                <td>2023-10-25</td>
                                <td>10:00 AM</td>
                                <td>11:00 AM</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection