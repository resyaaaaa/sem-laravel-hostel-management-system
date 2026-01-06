<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationApproved;
use App\Mail\ApplicationReceived;
use App\Models\Application;
use App\Models\Hostel;
use App\Models\Room;
use Hash;
use Illuminate\Http\Request;
use Mail;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'Student') {
            $application = Application::where('student_id', auth()->user()->students->id)->first();
            return view('applications.application_index', compact('application'));
        } elseif (auth()->user()->role == 'Manager') {
            $applications = Application::where('application_status', true)->get();
            return view('applications.application_manager_index', compact('applications'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hostel $hostel)
    {
        return view('applications.application_create', compact('hostel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'Name' => 'required|string|max:255',
                'roll_no' => 'required|string|max:255',
                'hostel' => 'required|string|max:255',
                'pwd' => 'required|string|max:255',
                'Message' => 'nullable|string|max:255',
            ]
        );

        if (Hash::check($validated['pwd'], auth()->user()->password)) {
            $application = Application::create(
                [
                    'student_id' => $validated['roll_no'],
                    'hostel_id' => $request['hostel_id'],
                    'application_message' => $validated['Message'],
                ]
            );
            Mail::to($application->hostel->managers->user->email)->send(new ApplicationReceived($application));
            return redirect()->route('application.index')->with('success', 'Application sent successfully')->with('email sent', 'You will be notified once the manager reviews your application');
        } else {
            return back()->withInput()->withErrors([
                'failed' => 'Incorrect Password!!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        if (auth()->user()->role == 'Student') {
            return view('applications.application_edit', compact('application'));
        } elseif (auth()->user()->role == 'Manager') {
            $rooms = Room::where('hostel_id', $application->hostel->id)->where('allocated', false)->get();
            return view('applications.application_manager_room', compact('application', 'rooms'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        if (auth()->user()->role == 'Student') {
            $validated = $request->validate(
                [
                    'Name' => 'required|string|max:255',
                    'roll_no' => 'required|string|max:255',
                    'hostel' => 'required|string|max:255',
                    'Message' => 'nullable|string|max:255',
                ]
            );

            $application->update(
                [
                    'application_message' => $validated['Message'],
                ]
            );
            Mail::to($application->hostel->managers->user->email)->send(new ApplicationReceived($application));
            return redirect()->route('application.index')->with('success', 'Application updated successfully')->with('email sent', 'You will be notified once the manager reviews your application');
        } elseif (auth()->user()->role == 'Manager') {
            $application->update(
                [
                    'room_id' => $request['roomId'],
                    'application_status' => false,
                ]
            );
            $application->room->update(
                [
                    'allocated' => true,
                ]
            );
            $application->student->update([
                'room_id' => $request['roomId'],
            ]);
            Mail::to($application->student->user->email)->send(new ApplicationApproved($application));
            return redirect()->route('application.index')->with('success', 'Room Assigned Successfully')->with('email sent', 'We have notified the student about the application status');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();
        return redirect()->route('application.index');
    }

    public function searchRollNo(Request $request)
    {
        $applicationsSearched = Application::where('student_id', 'LIKE', $request['search_box'] . '%')->where('application_status', true)->get();
        $applications = Application::where('application_status', true)->get();
        return view('applications.application_manager_index', compact('applications', 'applicationsSearched'));
    }
}
