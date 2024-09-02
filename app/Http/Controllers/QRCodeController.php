<?php

// app/Http/Controllers/QRCodeController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function show(User $user)
    {
        // Generate the QR code
        $qrCode = QrCode::size(300)->generate('https://example.com/some-url/'.$user->id);

        return view('qrcode.show', compact('qrCode', 'user'));
    }
}
