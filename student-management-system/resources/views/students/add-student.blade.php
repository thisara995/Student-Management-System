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
            <h1 class="mt-4 px-4">STUDENT SECTION</h1>
                    <ol class="breadcrumb mb-4 px-4">
                        <li class="breadcrumb-item"><a href="{{ url('/students') }}">Student</a></li>
                        <li class="breadcrumb-item active">Add Student</li>
                    </ol>

                <div class="container mb-4 mt-2">
                    <div class="text-center">
                        <h3>Student Add Form</h3>
                    </div>
               
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-light">
                                    <form action="{{ url('/students/store') }}" method="post" id="contact-form" role="form"autocomplete="off">
                                        @csrf
                                        <div class="controls">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name" class="mb-2">Student Name *</label>
                                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter Student Name *" required="required" aria-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_age" class="mb-2">Age *</label>
                                                        <input id="form_age" type="number" name="age" class="form-control" placeholder="Please enter Age *" required="required" aria-required="true" min="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_address" class="mb-2">Address *</label>
                                                        <textarea id="form_address" name="address" class="form-control" placeholder="Please enter Address *" rows="2" required="required" aria-required="true"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_mobile" class="mb-2">Mobile *</label>
                                                        <input id="form_mobile" type="tel" name="mobile" class="form-control" placeholder="Please enter Mobile Number *" required="required" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_parent_name" class="mb-2">Parent Name *</label>
                                                        <input id="form_parent_name" type="text" name="parent" class="form-control" placeholder="Please enter Parent Name *" required="required" aria-required="true">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_parent_mobile" class="mb-2">Parent Mobile *</label>
                                                        <input id="form_parent_mobile" type="tel" name="parent_mobile" class="form-control" placeholder="Please enter Parent Mobile Number *" required="required" aria-required="true">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-19 mt-2">
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
