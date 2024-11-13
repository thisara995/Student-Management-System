<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information and CSS Links -->
    @include('layouts.header')
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
                <h1 class="mt-4 px-4">USERS SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="{{url('/users')}}">User</a></li>
                    <li class="breadcrumb-item active">View User</li>
                </ol>
                <div class="container mb-4 mt-2" style="max-width: 50rem;">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">User Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title mb-3"><strong>User ID: </strong>{{ $user->id }}</h6>
                            <h6 class="card-title mb-3"><strong>User Name: </strong>{{ $user->name}}</h6>
                            <p class="card-text mb-3"><strong>Email: </strong>{{ $user->email }}</p>
                            <p class="card-text mb-3"><strong>Role:
                            <span class="badge 
                                {{ $user->role == 'admin' ? 'text-bg-success' : ($user->role == 'assistant' ? 'text-bg-primary' : 'text-bg-light') }}">
                                {{ $user->role }}
                            </span>
                            </p>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-primary btn-block mt-4">Back to Users</a>
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

    <script>
        function confirmDelete(itemId) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Course's data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // Submit the form
                    document.getElementById('delete-form-' + itemId).submit();
                    swal("Deleted!", "The Course has been deleted.", "success");
                } else {
                    swal("The Course data is safe!");
                }
            });
        }
    </script>

</body>
</html>
