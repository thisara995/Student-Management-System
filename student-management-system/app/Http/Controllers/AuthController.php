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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('dashboard')->withSuccess('You have Successfully logged in');
        }

        return redirect("login")->withErrors('Oops! You have entered invalid credentials');
    }

    // Display dashboard view after successful login
    public function dashboard(): View
    {
        return view('admin.dashboard');
    }

    // Display the registration form
    public function showRegistrationForm(): View
    {
        return view('admin.register');
    }

    // Display user profile
    public function showProfile(): View
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    // Handle user registration
    public function postRegistration(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:Admin,Assistant'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }

    // Handle logout
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    // Update user profile
    public function updateProfile(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    // Show form to add a new user

    public function user_index()
    {
    // Fetch all students from the database
    $user = User::all();
    // Pass the students to the view
    return view('users.list-users')->with('user', $user);

    }

    public function showAddUserForm(): View
    {
        return view('users.add-user');
    }

    // Handle adding a new user
    public function addUser(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:Admin,Assistant',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }

    // Show the edit user form
    public function editUser($id): View
    {
        $user = User::findOrFail($id);
        return view('users.edit-user', compact('user'));
    }

    // Handle updating user information
    public function updateUser(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:Admin,Assistant',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = $validatedData['role'];

        if ($request->filled('new_password')) {
            $user->password = Hash::make($validatedData['new_password']);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Handle deleting a user
    public function deleteUser($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
