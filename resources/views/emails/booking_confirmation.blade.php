<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Booking Confirmation</h2>

    <p>Dear {{ $bookingData['first_name'] }},</p>

    <p>Thank you for booking an appointment with our ambassador. Here are your booking details:</p>

    <ul>
        <li><strong>Name:</strong> {{ $bookingData['first_name'] }} {{ $bookingData['last_name'] }}</li>
        <li><strong>Email:</strong> {{ $bookingData['email'] }}</li>
        <li><strong>Ambassador:</strong> {{ $bookingData['ambassador'] }}</li>
        
    </ul>

    <h3>Payment Details</h3>
    <ul>
        <li><strong>Account Name:</strong> Anemba Benedict</li>
        <li><strong>Account Number:</strong> 0086387269</li>
        <li><strong>Bank Name:</strong> Access Bank</li>
    </ul>

    <p>Kindly provide evidence of payment via this email once the transaction is completed.</p>

    <p>We will contact you shortly to confirm the date and time for your appointment.</p>

    <p>Best regards,<br>
    Student Corner</p>
</body>
</html>
