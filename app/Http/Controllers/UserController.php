<?php

namespace App\Http\Controllers;

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
        // Validate the incoming request
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'numero_de_telephone' => 'required|string|min:9|max:15',
            'email' => 'required|email|unique:users,email',
        ]);
    
        // Create a new user instance and fill in the data
        $user = new User();
        $user->name = $validatedData['prenom'];
        $user->phone_number = $validatedData['numero_de_telephone'];
        $user->email = $validatedData['email'];
    
        // Save the user to the database
        $user->save();
    
        // Redirect to QR code route with user ID or other necessary data
        return redirect()->route('qrcode.show', ['user' => $user->id])->with('success', 'Data saved successfully!');
    }

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
