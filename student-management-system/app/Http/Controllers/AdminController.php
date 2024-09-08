<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    // Show login form for Admin
    public function login()
    {
        return view('admin.login'); // Replace with your login view
    }

    // Handle login form submission
    public function submit_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],

        [
            // Custom error messages
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.'
        ]);

        // Find the admin by email
        $admin = Admin::where('email', $request->email)->first();

        // If the admin exists and the password matches
        if ($admin && $admin->password === $request->password) {
            return redirect()->route('admin.dashboard');
        } else {
            // Return back with error if credentials do not match
            return back()->withErrors(['email' => 'Invalid email or password']);
        }
    }

    public function logout()
    {
        auth()->logout(); 
        return redirect()->route('admin.login')->with('success', 'Logout successfully.');
    }


    // Show register form for Admin
    public function register()
    {
        return view('admin.register'); // Replace with your register view
    }

    public function setting()
    {
        return view('admin.setting'); // Replace with your register view
    }


    // Show forget password form for Admin
    public function forget_password()
    {
        return view('admin.forget_password'); // Replace with your forget password view
    }

    // Show form to add a new Admin user
    public function create()
    {
        return view('admin.users.create'); // Replace with your user creation view
    }

    // Store a newly created Admin user in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'role' => 'required|in:Admin,Assistant',
        ]);

        // Create a new Admin user
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Store the password as plain text
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.add')->with('success', 'Admin user created successfully.');
    }

    // Show form to edit an existing Admin user
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.users.edit', compact('admin'));
    }

    // Update an existing Admin user's data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
            'role' => 'required|in:Admin,Assistant',
            'password' => 'nullable|min:6',
        ]);

        $admin = Admin::findOrFail($id);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password ?? $admin->password,
        ]);

        return redirect()->route('admin.users.view', $id)->with('success', 'Admin user updated successfully.');
    }

    // Display details of a specific Admin user
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.users.show', compact('admin'));
    }

    // Delete a specific Admin user
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.users.add')->with('success', 'Admin user deleted successfully.');
    }

    // Show admin dashboard
    public function dashboard()
    {
        return view('admin.dashboard'); // Replace with the actual view for the dashboard
    }
}
