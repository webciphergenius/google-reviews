<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\QRCodeMail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'numero_de_telephone' => 'required|string|min:9|max:15',
            'email' => 'required|email|unique:users,email',
        ]);
    
       
        $user = new User();
        $user->name = $validatedData['prenom'];
        $user->phone_number = $validatedData['numero_de_telephone'];
        $user->email = $validatedData['email'];
        $user->save();
    
        
        $qrCode = QrCode::format('png')->size(300)->generate('https://google.com');

            if (!file_exists(public_path('qrcodes'))) {
                mkdir(public_path('qrcodes'), 0755, true);
            }
            
            // Define the path to save the QR code in the public directory
            $qrCodePath = 'qrcodes/qrcode_' . $user->id . '.png';
        
            // Save the QR code image in the public directory
            file_put_contents(public_path($qrCodePath), $qrCode);
        
            // Get the public URL of the QR code image
            $qrCodeUrl = asset($qrCodePath);
    
        
        Mail::to($user->email)->send(new QRCodeMail($user, $qrCodePath));
    
        
        return response()->json([
            'success' => true,
            'message' => 'QR code sent to your email!'
        ]);    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:15',
        ]);

        $user->update($request->only(['name', 'email', 'phone_number']));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
