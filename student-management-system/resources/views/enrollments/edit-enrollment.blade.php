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
                    <li class="breadcrumb-item"><a href="{{ url('/enrollments') }}">Enrollemnt</a></li>
                    <li class="breadcrumb-item active">Edit Enrollemnt</li>
                </ol>

                <div class="container mb-4 mt-2">
                    <div class="text-center">
                        <h3>Enrollment Edit Form</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-light">
                                    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="post" id="enrollment-form" role="form" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                        <div class="controls">
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_enroll_no" class="mb-2">Enrollment Number *</label>
                                                        <input id="form_enroll_no" type="text" name="enroll_no" class="form-control" value="{{ old('name', $enrollment->enroll_no) }}" required aria-label="Enrollment No">
                                                    </div>
                                                </div>
                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_batch" class="mb-2">Batch *</label>
                                                        <select id="form_batch" name="batch_id" class="form-control" required>
                                                            <option value="" disabled selected>Select a Batch *</option>
                                                            @foreach($batches as $batch)
                                                                <option value="{{ $batch->id }}" {{ $batch->id == $enrollment->batch_id ? 'selected' : '' }}>
                                                                    {{ $batch->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_student" class="mb-2">Student *</label>
                                                        <select id="form_student" name="student_id" class="form-control" required>
                                                            <option value="" disabled selected>Select a Student *</option>
                                                            @foreach($students as $student)
                                                                <option value="{{ $student->id }}" {{ $student->id == $enrollment->student_id ? 'selected' : '' }}>
                                                                {{ $student->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_join_date" class="mb-2">Join Date *</label>
                                                        <input id="form_join_date" type="date" name="join_date" class="form-control" value="{{ old('join_date', $enrollment->join_date) }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_fee" class="mb-2">Enrollment Fee *</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">LKR</span>
                                                            <input id="form_fee" type="number" name="fee" class="form-control" value="{{ old('fee', $enrollment->fee) }}"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12 mt-3">
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
