<!DOCTYPE html>
<html>
<head>
    <title>New Consultation Request</title>
</head>
<body>
    <h1>New Consultation Request</h1>
    <p>Hello {{ $bookingData['ambassador'] }},</p>
    <p>You have received a new consultation request from Student Corner:</p>
    <ul>
        <li><strong>Name:</strong> {{ $bookingData['first_name'] }} {{ $bookingData['last_name'] }}</li>
        <li><strong>Location:</strong> {{ $bookingData['city'] }}, {{ $bookingData['country'] }}</li>
    </ul>
    <h2>Action Required:</h2>
    <p>Please reply to this email within 48 hours with:</p>
    <ol>
        <li>Your available time slots for the consultation</li>
        <li>Your preferred communication method (Zoom, Teams, etc.)</li>
        <li>Student Corner will take 20% of the Consultation Fee </li>
    </ol>
    <p>If you're unable to take this consultation, please notify the admin immediately.</p>
    <p>Thank you,<br>The Study Abroad Team</p>
</body>
</html>
