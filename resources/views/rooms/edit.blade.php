@extends('layouts.manager_app')

@section('content')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poiret One', cursive;
            background-color: #f8f9fa;
        }

        .page-wrapper {
            min-height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 15px;
        }

        .card-edit-room {
            width: 100%;
            max-width: 550px;
            padding: 35px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .heading-edit {
            font-size: 28px;
            color: #333;
            margin-bottom: 25px;
            font-weight: 500;
        }

        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #555;
            margin-bottom: 2px;
        }

        .select-field {
            width: 100%;
            padding: 5px 12px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            color: #555;
            outline-color: #3498db;
        }

        .select-field option {
            padding: 8px;
        }

        .btn-save-changes {
            width: 100%;
            padding: 5px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-save-changes:hover {
            background-color: #0056b3;
        }

        @media (max-width: 576px) {
            .card-edit-room {
                padding: 25px 20px;
            }

            .heading-edit {
                font-size: 24px;
            }

            .btn-save-changes {
                font-size: 16px;
                padding: 10px;
            }
        }
    </style>

    <div class="page-wrapper">
        <div class="card-edit-room">
            <h2 class="heading-edit">Editing Room {{ $currentRoom->room_no }}</h2>

            <form action="{{ route('rooms.update', $currentRoom->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!--[CR-HMS-303] Dropdown Menu-->
                <div class="form-group">
                    <label for="new_room_id">Select New Room Number</label>
                    <select name="new_room_id" id="new_room_id" class="select-field" required>
                        <option value="" disabled selected>Select a vacant room</option>
                        @foreach ($vacantRooms as $room)
                            <option value="{{ $room->id }}">{{ $room->room_no }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn-save-changes">Save Changes</button>
            </form>
        </div>
    </div>
@endsection
