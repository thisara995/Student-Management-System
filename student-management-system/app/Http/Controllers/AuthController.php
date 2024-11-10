<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    // Display login form
    public function showLoginForm(): View
    {
        return view('admin.login');
    }

    // Handle login request
    public function login(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Prepare the credentials array
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // Attempt to log the user in with provided credentials
        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard')
            ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withErrors('Oops! You have entered invalid credentials');
    }

    // Display the dashboard view after successful login
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }

    // Display the registration form
    public function showRegistrationForm(): View
    {
        return view('admin.register');
    }

    // Handle user registration
    public function postRegistration(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string'
        ]);

        // Create a new user instance and hash the password
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Regenerate session after login
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    // Handle logout
    public function logout(Request $request): RedirectResponse
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
