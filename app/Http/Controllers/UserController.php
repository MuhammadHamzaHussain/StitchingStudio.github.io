<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6', // Adjust the minimum length as needed
        ]);

        // Create a new user if validation passes
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirect to the login page
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $isTaken = User::where('email', $email)->exists();

        return response()->json(['isTaken' => $isTaken]);
    }

}
