<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information and CSS Links -->
    @include('layouts.header')
    <style>
        .container {
            margin-top: 2rem; /* Adjust this value as needed */
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
                <h1 class="mt-4 px-4">ENROLLMENT SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="{{url('/enrollments')}}">Enrollemnt</a></li>
                    <li class="breadcrumb-item active">View Enrollemnt</li>
                </ol>
                <div class="container mb-4 mt-2" style="max-width: 50rem;">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Enrollemnt Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title mb-3"><strong>Enrollemnt Number: </strong>{{ $enrollment->enroll_no }}</h6>
                            <h6 class="card-title mb-3"><strong>Batch Name: </strong>{{ $enrollment->batch->name }}</h6>
                            <p class="card-text mb-3"><strong>Student Name: </strong>{{ $enrollment->student->name }}</p>
                            <p class="card-text mb-3"><strong>Join Date: </strong>{{ $enrollment->join_date }}</p>
                            <p class="card-text mb-3"><strong>Fee: </strong>LKR  {{ $enrollment->fee }}</p>
                            <a href="{{ route('enrollments.list') }}" class="btn btn-outline-primary btn-block mt-4">Back to enrollments</a>
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
