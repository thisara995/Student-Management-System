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

                <div class="container mb-4 mt-2">
                    <div class="text-center">
                        <h3>Course Add Form</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-light">
                                    <form action="{{url('/courses/store')}}" method="post" id="contact-form" role="form" autocomplete="off">
                                        @csrf
                                        <div class="controls">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name" class="mb-2">Course Name *</label>
                                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter Course Name *" required="required" aria-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_title" class="mb-2">Course Title *</label>
                                                        <input id="form_title" type="text" name="title" class="form-control" placeholder="Please enter Course Title *" required="required" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_description" class="mb-2">Course Description *</label>
                                                        <textarea id="form_description" name="description" class="form-control" placeholder="Please enter Course Description *" rows="2" required="required" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_syllabus" class="mb-2">Course Syllabus *</label>
                                                        <textarea id="form_syllabus" name="syllabus" class="form-control" placeholder="Please enter Course Syllabus *" rows="2" required="required" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_duration" class="mb-2">Course Duration *</label>
                                                        <select id="form_duration" name="duration" class="form-control" required="required" aria-required="true">
                                                            <option value="" disabled selected>Please select a duration *</option>
                                                            <option value="3">3 Months</option>
                                                            <option value="6">6 Months</option>
                                                            <option value="12">12 Months</option>
                                                        </select>
                                                    </div>
                                                </div>
                                        
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_teacher_select" class="mb-2">Teacher *</label>
                                                        <select id="form_teacher_select" name="teacher" class="form-control" required="required" aria-required="true">
                                                            <option value="" disabled selected>Please select a Teacher *</option>
                                                            @foreach($teachers as $teacher)
                                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-19 mt-3">
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
