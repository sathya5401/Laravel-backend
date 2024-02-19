<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use App\Models\User; 

class AuthController extends Controller
{
    public function register(Request $request)
{
    // Validate incoming request fields
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        'is_admin' => 'required|boolean',
    ]);

    try {
        // Create new User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin,
        ]);

        // Return a success response
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    } catch (\Exception $e) {
        // Handle any exceptions (e.g., database errors)
        return response()->json(['message' => 'Failed to register user', 'error' => $e->getMessage()], 500);
    }
}

    
    // Function to handle user login
    public function login(Request $request)
    {
        // Validate incoming request fields
        $request->validate([
        'email' => 'required|string|email', // Email must be a string, a valid email and it is required
        'password' => 'required|string', // Password must be a string and it is required
        ]);

        // Check if the provided credentials are valid
        if (!Auth::attempt($request->only('email', 'password'))) {
        // If not, return error message with a 401 (Unauthorized) HTTP status code
        return response()->json(['message' => 'Invalid login details'], 401);
        }

        // If credentials are valid, get the authenticated user
        $user = $request->user();
        // Create a new token for this user
        $token = $user->createToken('authToken')->plainTextToken;

        // Return user data and token as JSON
        return response()->json(['user' => $user, 'token' => $token]);
    }

    // Function to handle user logout
    public function logout(Request $request)
    {
        // Delete all tokens for the authenticated user
        $request->user()->tokens()->delete();

        // Return success message as JSON
        return response()->json(['message' => 'Logged out']);
    }


}
