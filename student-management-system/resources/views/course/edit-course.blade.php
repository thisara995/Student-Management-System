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
                    <li class="breadcrumb-item"><a href="{{ url('/courses') }}">Course</a></li>
                    <li class="breadcrumb-item active">Edit Course</li>
                </ol>

                <div class="container mb-4 mt-2">
                    <div class="text-center">
                        <h3>Course Edit Form</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-light">
                                    <form action="{{ url('/courses/' . $course->id . '/update') }}" method="post" id="contact-form" role="form" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                        <div class="controls">

                                            <!-- Course Name and Title -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name" class="mb-2">Course Name *</label>
                                                        <input id="form_name" type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}" required aria-label="Course Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_title" class="mb-2">Course Title *</label>
                                                        <input id="form_title" type="text" name="title" class="form-control" value="{{ old('title', $course->title) }}" required aria-label="Course Title">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Course Description and Syllabus -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_description" class="mb-2">Course Description *</label>
                                                        <textarea id="form_description" name="description" class="form-control" rows="2" required aria-label="Course Description">{{ old('description', $course->description) }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_syllabus" class="mb-2">Course Syllabus *</label>
                                                        <textarea id="form_syllabus" name="syllabus" class="form-control" rows="2" required aria-label="Course Syllabus">{{ old('syllabus', $course->syllabus) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Course Duration and Teacher Selection -->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_duration" class="mb-2">Course Duration *</label>
                                                        <select id="form_duration" name="duration" class="form-control" required>
                                                            <option value="3" {{ old('duration', $course->duration) == 3 ? 'selected' : '' }}>3 months</option>
                                                            <option value="6" {{ old('duration', $course->duration) == 6 ? 'selected' : '' }}>6 months</option>
                                                            <option value="12" {{ old('duration', $course->duration) == 12 ? 'selected' : '' }}>12 months</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_teacher_select" class="mb-2">Teacher *</label>
                                                        <select id="form_teacher_select" name="teacher" class="form-control" required aria-label="Teacher">
                                                            <option value="" disabled selected>Please select a Teacher *</option>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>
                                                                    {{ $teacher->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Submit and Reset Buttons -->
                                            <div class="col-md-12 mt-2">
                                                <input type="submit" class="btn btn-success btn-send pt-2 btn-block mb-2 me-md-2" value="Submit">
                                                <input type="reset" class="btn btn-warning btn-send pt-2 btn-block mb-2" value="Reset">
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
