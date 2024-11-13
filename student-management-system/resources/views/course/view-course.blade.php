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
                <h1 class="mt-4 px-4">COURSE SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="{{url('/courses')}}">Course</a></li>
                    <li class="breadcrumb-item active">Add Course</li>
                </ol>
                <div class="container mb-4 mt-2" style="max-width: 50rem;">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Course Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title mb-3"><strong>Course Name: </strong>{{ $course->name }}</h6>
                            <h6 class="card-title mb-3"><strong>Title: </strong>{{ $course->title }}</h6>
                            <p class="card-text mb-3"><strong>Description: </strong>{{ $course->description }}</p>
                            <p class="card-text mb-3"><strong>Syllabus: </strong>{{ $course->syllabus }}</p>
                            <p class="card-text mb-3"><strong>Duration: </strong>{{ $course->duration }} months</p>
                            <p class="card-text mb-3"><strong>Teacher: </strong>{{ $course->teacher->name }}</p>
                            <a href="{{ route('courses.list') }}" class="btn btn-outline-primary btn-block mt-4">Back to Courses</a>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <small>Updated {{ $course->updated_at->diffForHumans() }}</small>
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
