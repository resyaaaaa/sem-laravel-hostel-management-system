<link href="//fonts.googleapis.com/css?family=Poiret+One&subset=cyrillic,latin-ext" rel="stylesheet">

<style>
    .container {
        font-family: 'Poiret One', cursive;
        display: grid;
        padding-top: 20px;
        max-width: 900px;
        margin: 0 auto;
    }

    .heading {
        font-size: 38px;
        font-weight: bold;
        color: #444;
        margin-bottom: 20px;
    }

    .form-row {
        display: flex;
        gap: 30px;
        align-items: flex-start;
    }

    .input-col {
        flex: 1;
    }

    .button-col {
        flex: 1;
    }

    .input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #cccccc;
        font-family: 'Poiret One', cursive;

        font-size: 14px;
        color: #777;
    }

    .input:disabled {
        background-color: #fff;
    }

    .btn-vacate {
        background-color: #ff4d4d;
        color: white;
        border: none;
        padding: 10px 30px;
        font-size: 20px;
        cursor: pointer;
        width: 250px;
        font-family: 'Poiret One', cursive;
        transition: background 0.3s;
    }

    .btn-vacate-submit:hover {
        background-color: #e60000;
    }
</style>
@extends('layouts.manager_app')
@section('content')
    <div class="container">
        <h2 class="heading">Vacate Form</h2>

        <form action="{{ route('rooms.vacate') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="input-col">
                    <input type="text" name="roll_no" class="input" placeholder="Roll Number" required>
                    <input type="text" class="input" value="{{ $hostel->hostel_name }}" disabled>
                    <input type="text" name="room_no" class="input" placeholder="Room Number" required>
                </div>

                <div class="button-col">
                    <button type="submit" class="btn-vacate">
                        Click To Vacate
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
