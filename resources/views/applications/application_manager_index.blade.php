@extends('layouts.manager_app')

@section('content')
    <!-- Search Section -->
    <section class="contact py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('email sent'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('email sent') }}
                </div>
            @endif
            <div class="mail_grid_w3l">
                <form action="{{ route('application.searchRollNo') }}">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" placeholder="Search by Roll Number" name="search_box"
                                class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Search Results Section -->
    @if (isset($applicationsSearched))
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student ID</th>
                        <th>Hostel</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($applicationsSearched) == 0)
                        <tr>
                            <td colspan="4">No Rows Returned</td>
                        </tr>
                    @else
                        @foreach ($applicationsSearched as $applicationSearched)
                            <tr>
                                <td>{{ $applicationSearched->student->user->name }}</td>
                                <td>{{ $applicationSearched->student_id }}</td>
                                <td>{{ $applicationSearched->hostel->hostel_name }}</td>
                                <td>{{ $applicationSearched->application_message }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    @endif

    <!-- Applications Received Section -->
    <div class="container">
        <h2 class="heading text-capitalize mb-sm-5 mb-4"> Applications Received </h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Hostel</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($applications) == 0)
                    <tr>
                        <td colspan="5">No Rows Returned</td>
                    </tr>
                @else
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{ $application->student->user->name }}</td>
                            <td>{{ $application->student_id }}</td>
                            <td>{{ $application->hostel->hostel_name }}</td>
                            <td>{{ $application->application_message }}</td>
                            <td>
                                <a href="{{ route('application.edit', ['application' => $application]) }}"
                                    class="btn btn-primary">
                                    Assign Room
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
