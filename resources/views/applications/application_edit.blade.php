@extends('layouts.student_app')

@section('content')
    <section class="contact py-5">
        <div class="container">
            <h2 class="heading text-capitalize mb-sm-5 mb-4"> Application Form </h2>
            <div class="mail_grid_w3l">
                <form action="{{ route('application.update', ['application' => $application]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 contact_left_grid" data-aos="fade-right">
                            <div class="contact-fields-w3ls">
                                <input type="text" name="Name" placeholder="Name"
                                    value="{{ $application->student->user->name }}" required readonly>
                                @error('Name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact-fields-w3ls">
                                <input type="text" name="roll_no" placeholder="Roll Number"
                                    value="{{ $application->student_id }}" required readonly>
                                @error('roll_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="contact-fields-w3ls">
                                <input type="text" name="hostel" placeholder="Hostel"
                                    value="{{ $application->hostel->hostel_name }}" required readonly>
                                @error('hostel')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 contact_left_grid" data-aos="fade-left">
                            <div class="contact-fields-w3ls">
                                <textarea name="Message" placeholder="Message...">{{ $application->application_message }}</textarea>
                            </div>
                            @error('Message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="submit" name="submit" value="Save Changes">
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </section>
@endsection
