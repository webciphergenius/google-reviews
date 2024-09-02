<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create QR Code</title>
</head>
<body>
    <h1>Generate QR Code</h1>
    <form action="{{ route('qrcode.store') }}" method="POST">
        @csrf
        <label for="data">Enter Data:</label>
        <input type="text" name="data" id="data" required>
        <button type="submit">Generate QR Code</button>
    </form>
</body>
</html>
