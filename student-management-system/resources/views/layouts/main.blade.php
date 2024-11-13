<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    
    <!-- Stat Cards Row -->
    <div class="row">
        <!-- Student Count Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div><i class="fas fa-user-graduate fa-2x"></i></div>
                    <div><span class="h4 ml-2">{{$totalStudents}}</span> Students</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/students')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Batch Count Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div><i class="fas fa-users fa-2x"></i></div>
                    <div><span class="h4 ml-2">{{$totalBatches}}</span> Batches</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/batches')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Course Count Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div><i class="fas fa-book-open fa-2x"></i></div>
                    <div><span class="h4 ml-2">{{$totalCourses}}</span> Courses</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/courses')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Enrollment Count Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-info text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div><i class="fas fa-clipboard-list fa-2x"></i></div>
                    <div><span class="h4 ml-2">{{$totalEnrollments}}</span> Enrollments</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/enrollments')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Payment Count Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-white text-dark mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div><i class="fas fa-dollar-sign fa-2x"></i></div>
                    <div><span class="h4 ml-2">LKR. {{ number_format($totalPayments, 2) }}</span> Payments</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-black stretched-link" href="{{url('/payments')}}">View Details</a>
                    <div class="small text-black"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Teacher Count Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div><i class="fas fa-chalkboard-teacher fa-2x"></i></div>
                    <div><span class="h4 ml-2"> {{$totalTeachers}}</span> Teachers</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/teachers')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- User Count Card -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-dark text-white mb-4">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div><i class="fas fa-users fa-2x"></i></div>
                    <div><span class="h4 ml-2">{{$totalUsers}}</span> Users</div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{url('/users')}}">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
