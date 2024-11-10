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
                <h1 class="mt-4 px-4">BATCH SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="">Batch</a></li>
                    <li class="breadcrumb-item active">Add Batch</li>
                </ol>
                <div class="container mb-4 mt-2" style="max-width: 50rem;">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Batch Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title mb-3"><strong>Batch ID: </strong>{{ $batch->id }}</h6>
                            <h6 class="card-title mb-3"><strong>Batch Name: </strong>{{ $batch->name }}</h6>
                            <p class="card-text mb-3"><strong>Course Name: </strong>{{ $batch->course->name }}</p>
                            <p class="card-text mb-3"><strong>Start Date: </strong>{{ $batch->start_date }}</p>
                        
                            <a href="{{ route('batches.list') }}" class="btn btn-outline-primary btn-block mt-4">Back to Batches</a>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <small>Updated {{ $batch->updated_at->diffForHumans() }}</small>
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
