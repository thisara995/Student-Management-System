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
                <h1 class="mt-4 px-4">BATCH SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="{{url('/batches')}}">Batch</a></li>
                    <li class="breadcrumb-item active">Edit Batch</li>
                </ol>

                <div class="container mb-4 mt-2">
                    <div class="text-center">
                        <h3>Batch Edit Form</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body">
                                <form action="{{ route('batches.update', $batch->id) }}" method="POST" id="batch-form" role="form" autocomplete="off">
                                    @csrf
                                    @method('PUT') 
                                    
                                    <div class="controls">
                                        <!-- Batch Name -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="form_batch_name" class="mb-2">Batch Name *</label>
                                                <input id="form_batch_name" type="text" name="batch_name" class="form-control" value="{{ old('batch_name', $batch->name) }}" required>
                                                @error('batch_name')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Course Selection -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="form_course" class="mb-2">Course *</label>
                                                <select id="form_course" name="course_id" class="form-control" required>
                                                    <option value="" disabled selected>Select Course *</option>
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}" {{ $course->id == $batch->course_id ? 'selected' : '' }}>
                                                            {{ $course->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('course_id')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Start Date -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="form_start_date" class="mb-2">Start Date *</label>
                                                <input id="form_start_date" type="date" name="start_date" class="form-control" value="{{ old('start_date', $batch->start_date) }}" required>
                                                @error('start_date')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Submit and Reset Buttons -->
                                        <div class="col-md-12 mt-3 text-center">
                                            <button type="submit" class="btn btn-success me-md-2">Update Batch</button>
                                            <a href="{{ route('batches.list') }}" class="btn btn-warning btn-send pt-2 btn-block mb-2">Cancel</a>
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
