@extends('layouts.manager_app')

@section('content')
    <!-- Search Section -->
    <section class="contact py-5">
        <div class="container">
            <div class="mail_grid_w3l">
                <form action="">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" placeholder="Search by Room Number" name="search_box" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Search" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Search Results -->
    {{-- @if (isset($searchResults))
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Hostel Name</th>
                        <th>Room Number</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($searchResults->isEmpty())
                        <tr>
                            <td colspan="2">No Rows Returned</td>
                        </tr>
                    @else
                        @foreach ($searchResults as $room)
                            <tr>
                                <td>{{ $hostelName }}</td>
                                <td>{{ $room->Room_No }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    @endif --}}

    <!-- Empty Rooms Section -->
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2 class="heading text-capitalize mb-sm-5 mb-4">Empty Rooms</h2>
            </div>
            <div class="col-3">
                <a href="" class="btn btn-primary">Add new room</a>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hostel Name</th>
                    <th>Room Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($rooms->isEmpty())
                    <tr>
                        <td colspan="3">No Rows Returned</td>
                    </tr>
                @else
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->hostel->hostel_name }}</td>
                            <td>{{ $room->room_no }}</td>
                            <td>
                                <form action="{{ route('application.update', ['application' => $application]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="roomId" value="{{ $room->id }}">
                                    <button type="submit" class="btn btn-sm border border-dark">Assign</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
