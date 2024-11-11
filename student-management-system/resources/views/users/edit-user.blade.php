<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information and CSS Links -->
    @include('layouts.header')
    <style>
        .container {
            margin-top: 2rem;
        }
    </style>
</head>
<body class="sb-nav-fixed">
    <!-- Navbar -->
    @include('layouts.navbar')

    <div id="layoutSidenav">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <div id="layoutSidenav_content">
            <!-- Main Content -->
            <main>
                <h1 class="mt-4 px-4">USER SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>

                <div class="container mb-4 mt-2">
                    <div class="text-center">
                        <h3>User Edit Form</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-light">
                                <form action="{{ route('users.update', $user->id) }}" method="POST" id="user-form" role="form" autocomplete="off">
                                    @csrf
                                    @method('PUT') 
                                    <div class="controls">
                                        <div class="row mb-3">
                                            <!-- Name -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_name" class="mb-2">Name *</label>
                                                    <input id="form_name" type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                                                    @error('name')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_email" class="mb-2">Email *</label>
                                                    <input id="form_email" type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                                    @error('email')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <!-- Role Selection -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_role" class="mb-2">Role *</label>
                                                    <select id="form_role" name="role" class="form-control" required>
                                                        <option value="" disabled>Select Role *</option>
                                                        <option value="Admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                                        <option value="Assistant" {{ $user->role === 'assistant' ? 'selected' : '' }}>Assistant</option>
                                                    </select>
                                                    @error('role')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Password -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_password" class="mb-2">Password *</label>
                                                    <input id="form_password" type="password" name="password" class="form-control" value="{{ $user->password }}" readonly>
                                                    @error('password')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <!-- Password Confirmation -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="form_password_confirmation" class="mb-2">New Password *</label>
                                                    <input id="form_new_password" type="password" name="new_password" class="form-control" placeholder="New Password *">
                                                    @error('password_confirmation')
                                                        <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit and Reset Buttons -->
                                        <div class="col-md-12 mt-3">
                                            <input type="submit" class="btn btn-success btn-send pt-2 btn-block mb-2 me-md-2" value="Update User">
                                            <a href="{{ route('users.index') }}" class="btn btn-warning btn-send pt-2 btn-block mb-2">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
    </div>

    <!-- Scripts -->
    @include('layouts.scripts')
</body>
</html>
