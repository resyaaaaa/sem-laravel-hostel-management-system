<h3 style="text-align: center">You Have A New Hostel Application From Student</h3>
<br>

<p>Student ID: <strong>{{ $application->student_id }}</strong></p>
<p>Apply For: <strong>Hostel {{ $application->hostel->hostel_name }}</strong></p>
<p>Application Message: <strong>{{ $application->application_message ?? '-' }}</strong></p>
<p>Application Status: <strong style="color: darkkhaki">Pending Approval</strong></p>
<p>Applied At: <strong>{{ $application->updated_at->format('d/m/Y H:i') }}</strong></p>
