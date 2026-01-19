<link href="//fonts.googleapis.com/css?family=Poiret+One&subset=cyrillic,latin-ext" rel="stylesheet">

<style>
    .page-wrapper {
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Poiret One', cursive;
    }

    .card-add-room {
        width: 100%;
        max-width: 500px;
        padding: 20px;
        border: 1px solid #eeeeee;
        border-radius: 5px;
        background: #fff;
    }

    .heading-add {
        font-size: 24px;
        color: #444;
        text-align: center;
        margin-bottom: 20px;
        font-weight: normal;
    }

    .form-group label {
        font-size: 14px;
        color: #333;
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    .input-field {
        width: 100%;
        padding: 5px 15px;
        border: 1px solid #cccccc;
        border-radius: 4px;
        font-size: 12px;
        font-family: 'Poiret One', cursive;
        font-weight: normal;
        color: #777;
    }

    .input-field::placeholder {
        color: #ccc;
    }

    .btn-submit-room {
        background-color: #007bff;
        color: white;
        border: none;
        width: 100%;
        padding: 10px;
        font-size: 12px;
        border-radius: 5px;
        margin-top: 5px;
        cursor: pointer;
        font-family: 'Poiret One', cursive;
    }

    .btn-submit-room:hover {
        background-color: #0069d9;
    }
</style>
@extends('layouts.manager_app')
@section('content')
    <div class="page-wrapper">
        <div class="card-add-room">
            <h2 class="heading-add">Add New Room</h2>

            <form action="{{ route('rooms.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="roomNo">Room Number</label>
                    <input type="text" name="roomNo" id="roomNo" class="input-field" placeholder="e.g. 123" required>
                </div>

                <button type="submit" class="btn-submit-room">
                    Add Room
                </button>
            </form>
        </div>
    </div>
@endsection
