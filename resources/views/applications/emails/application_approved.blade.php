<h3 style="text-align: center">Your Hostel Application Has Been Approved</h3>
<br>

<p>Student ID: <strong>{{ $application->student_id }}</strong></p>
<p>Apply For: <strong>Hostel {{ $application->hostel->hostel_name }}</strong></p>
<p>Application Message: <strong>{{ $application->application_message ?? '-' }}</strong></p>
<p>Application Status: <strong style="color: lawngreen">Approved</strong></p>
<p>Room Given: <strong style="color: lawngreen">{{ $application->room->room_no }}</strong></p>
<p>Approved At: <strong>{{ $application->updated_at->format('d/m/Y H:i') }}</strong></p>
