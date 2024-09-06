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
            <h1 class="mt-4 px-4">STUDENT SECTION</h1>
                    <ol class="breadcrumb mb-4 px-4">
                        <li class="breadcrumb-item"><a href="{{ url('/students') }}">Student</a></li>
                        <li class="breadcrumb-item active">View Student</li>
                    </ol>
            <div class="container mt-">
            <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                        <div class="col-lg-6 mb-4 mb-lg-3 pe-3"> <!-- pe-3 adds right padding -->
    <img src="https://cdn-icons-png.flaticon.com/512/3736/3736502.png" alt="..." class="ms-4 mb-4" width="400" height="400"> <!-- ms-3 adds left margin -->
</div>


                            <div class="col-lg-6 px-xl-10">
                            <div class="bg-secondary py-2 px-3 mb-2 rounded">
                            <h3 class="h2 text-white mb-0">Student Details</h3>
                            </div>              

                            <ul class="list-unstyled mb-1-9 mt-3">
    <li class="mb-2 mb-xl-3 display-28">
        <span class="display-26 text-secondary me-2 font-weight-600">Student Name:</span>{{ $student->name }}
    </li>
    <li class="mb-2 mb-xl-3 display-28">
        <span class="display-26 text-secondary me-2 font-weight-600">Age:</span>{{ $student->age }}
    </li>
    <li class="mb-2 mb-xl-3 display-28">
        <span class="display-26 text-secondary me-2 font-weight-600">Address:</span>{{ $student->address }}
    </li>
    <li class="mb-2 mb-xl-3 display-28">
        <span class="display-26 text-secondary me-2 font-weight-600">Mobile:</span>{{ $student->mobile }}
    </li>
    <li class="mb-2 mb-xl-3 display-28">
        <span class="display-26 text-secondary me-2 font-weight-600">Parent Name:</span>{{ $student->parent }}
    </li>
    <li class="display-28">
        <span class="display-26 text-secondary me-2 font-weight-600">Parent Mobile:</span>{{ $student->parent_mobile }}
    </li>
</ul>

                            </div>
                        </div>
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
