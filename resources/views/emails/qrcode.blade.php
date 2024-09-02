<!-- resources/views/emails/qrcode.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your QR Code</title>
</head>
<body>
    <p>Hello {{ $user->name }},</p>
    <p>Thank you for your submission! Here is your QR code:</p>
    <p><img src="{{ $message->embed($qrCodePath) }}" alt="QR Code"></p>
    <p>Best regards,<br>Your Team</p>
</body>
</html>
