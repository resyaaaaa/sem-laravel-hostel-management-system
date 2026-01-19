<?php

namespace App\Http\Controllers;

// Models
use App\Models\Application;
use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function HostelManager(){

     $user = Auth::user();

    if ($user->role !== 'manager' || !$user->hostel_id) {
        abort(403, 'Unauthorized access');
    }

    return $user->hostel_id;
    }
    /**
     * Display all allocated rooms for the manager's hostel
     */
    public function allocated()
    {
        $hostel_id = Auth::user()->hostel_id;

        // Get students in this hostel with an assigned room
        $students = Student::where('hostel_id', $hostel_id)
            ->whereNotNull('room_id')
            ->get();

        return view('rooms.allocated', compact('students'));
    }

    /**
     * Display all empty rooms
     */
    public function empty()
{
    $user = auth()->user();

    if (!$user->manager) {
        abort(403, 'Managers only');
    }

    $hostel = $user->manager->hostel;

    if (!$hostel) {
        abort(403, 'Hostel not assigned to this manager');
    }

    $rooms = Room::where('hostel_id', $hostel->id)
        ->where('allocated', false)
        ->get();

    return view('rooms.empty', compact('rooms'));
}


    /**
     * Show the form for creating a new room.
     */
    public function create()
    {
        $hostel = Auth::user()->hostel;

        return view('rooms.create', compact('hostel'));
    }

    /**
     * Store a newly created room
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_no' => 'required|integer',
        ]);

        Room::create([
            'hostel_id' => Auth::user()->hostel_id,
            'room_no' => $request->room_no,
            'allocated' => false,
        ]);

        return redirect()->route('rooms.empty')->with('success', 'Room Added Successfully');
    }

    /**
     * Show edit form with vacant rooms list
     */
    public function edit(Room $room)
    {
          $user = auth()->user();

    if (!$user->manager || !$user->manager->hostel) {
        abort(403, 'Managers only or hostel not assigned.');
    }
        $currentRoom = $room;
        // Get vacant rooms in the same hostel
        $vacantRooms = Room::where('hostel_id', $user->manager->hostel_id)
            ->where('allocated', false)
            ->get();

        return view('rooms.edit', compact('currentRoom', 'vacantRooms'));
    }

    /**
     * Update room assignment (Move student to a new room)
     */
    public function update(Request $request)
    {
        // [CR-HMS-304] Input Validation
        $request->validate([
            'new_room_id' => 'required|exists:rooms,id',
            'current_room_id' => 'required|exists:rooms,id',
        ]);

        try {
            // [CR-HMS-302] Database Transaction
            DB::transaction(function () use ($request) {
                $oldRoom = Room::findOrFail($request->current_room_id);
                $newRoom = Room::findOrFail($request->new_room_id);

                // Reassign Student
                Student::where('room_id', $oldRoom->id)
                    ->update(['room_id' => $newRoom->id]);

                // Update Application records
                Application::where('room_no', $oldRoom->room_no)
                    ->where('hostel_id', auth()->user()->hostel_id)
                    ->update(['room_no' => $newRoom->room_no]);

                // Update Room status
                $oldRoom->update(['allocated' => false]);
                $newRoom->update(['allocated' => true]);
            });

            return redirect()->route('rooms.allocated')->with('success', 'Room Updated Successfully');

            // [CR-HMS-304] Catch Exceptions
        } catch (\Exception $e) {
            return back()->with('error', 'System Error: Update failed.');
        }
    }

    /**
     * Show the vacate form
     */
    public function showVacate()
    {
        $user= auth()->user();

        // Role check
        if (!$user->manager) {
            abort(403,'Managers Only');
        }
        $hostel = $user->manager->hostel;

        if (!$hostel) {
            abort(403,'Hostel not assigned to this manager');
        }

        return view('rooms.vacate', compact('hostel'));
    }

    /**
     * Process the room vacation
     */
    public function vacate(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'room_no' => 'required|integer',
        ]);

        $hostel_id = Auth::user()->hostel_id;

        DB::transaction(function () use ($request, $hostel_id) {
            $room = Room::where('hostel_id', $hostel_id)
                ->where('room_no', $request->room_no)
                ->firstOrFail();

            $student = Student::where('student_id', $request->student_id)
                ->where('hostel_id', $hostel_id)
                ->where('room_id', $room->id)
                ->firstOrFail();

            // Clear student/room
            $student->update(['room_id' => null]);
            $room->update(['allocated' => false]);

            // Remove application record
            Application::where('student_id', $student->id)->delete();
        });

        return back()->with('success', 'Vacated Successfully');
    }

    public function destroy(Room $room)
    {
        if ($room->allocated) {
            return back()->with('error', 'Cannot delete a room already allocated');
        }
        $room->delete();

        return redirect()->route('rooms.empty')->with('success', 'Room Deleted Successfully');
    }
}
