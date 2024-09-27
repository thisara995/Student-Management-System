<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View; // Ensure this import is included
use Illuminate\Http\RedirectResponse; // Ensure this import is included


class AuthController extends Controller
{
    // Display the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle the login request
    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerate the session
            return redirect()->intended('dashboard')->with('success', 'You have successfully logged in');
        } else {
            return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }


    public function dashboard(): View
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        }

        return view('admin.login')->with('error', 'You are not allowed to access');
    }

    // Display the registration form
    public function registration()
    {
        return view('admin.register');
    }

    // Handle registration logic
    public function postRegistration(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Confirm password validation
            'role' => 'required|string' // Ensure the role is provided
        ]);

        // Create the user and automatically log in
        $user = $this->create($request->all());
        Auth::login($user);

        // Redirect to dashboard after successful registration
        return redirect()->route('dashboard')->with('success', 'Registration successful! You are now logged in.');
    }

    // Create a new user instance
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
