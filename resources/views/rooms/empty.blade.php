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
<div class="container py-5">

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif


    {{-- Header --}}
    <div class="row align-items-center mb-4">
        <div class="col-md-8">
            <h2 class="heading text-capitalize">Empty Rooms</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                Add New Room
            </a>
        </div>
    </div>

    {{-- Table --}}
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Hostel Name</th>
                <th>Room Number</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rooms as $room)
                <tr>
                    <td>{{ $room->hostel->hostel_name }}</td>
                    <td>{{ $room->room_no }}</td>
                    <td class="text-center">
                        <a href="{{ route('rooms.edit', $room->id) }}"
                           class="btn btn-sm btn-primary">
                            Edit
                        </a>

                        <form action="{{ route('rooms.destroy', $room->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Delete this room?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        No empty rooms found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
