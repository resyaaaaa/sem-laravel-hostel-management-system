@extends('layouts.manager_app')

@section('content')
    <!--Search Section-->
    <section class="contact py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="mail_grid_w3l">
                <form action="{{ route('rooms.allocated') }}" method="GET">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" placeholder="Search by Roll Number" name="search_box" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--Alloted Room Entries-->
    <div class="container">
        <h2 class="heading text-capitalize mb-sm-5 mb-4">Rooms Allotted</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Contact Number</th>
                    <th>Hostel</th>
                    <th>Room Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->fname }} {{ $student->lname }}</td>
                        <td>{{ $student->student_id }}</td>
                        <td>{{ $student->mob_no }}</td>
                        <td>{{ $student->hostel->name ?? 'A' }}</td>
                        <td style="color: #3498db;">{{ $student->room->room_no ?? '-' }}</td>
                        <td>
                            <a href="{{ route('rooms.edit', $student->room_id) }}"
                                class="btn btn-primary btn-sm btn-edit">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Rows Returned</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </div>
@endsection
