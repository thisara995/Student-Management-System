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
            <h1 class="mt-4 px-4">TEACHER SECTION</h1>
                    <ol class="breadcrumb mb-4 px-4">
                        <li class="breadcrumb-item"><a href="{{ url('/teachers') }}">Teacher</a></li>
                        <li class="breadcrumb-item active">Edit Teachert</li>
                    </ol>
                        <div class="container">
                            <div class="text-center mt-3">
                                <h3>Teacher Edit Form</h3>
                            </div>

                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                                <div class="card mt-2 mx-auto p-4 bg-light">
                                    <div class="card-body bg-light">
                                        <form action="{{ url('/teachers/'.$teacher->id.'/update') }}" method="post" id="contact-form" role="form" autocomplete="off">
                                        @csrf
                                        @method('PUT') 

                                            <div class="controls">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="form_name" class="mb-2">Teacher Name *</label>
                                                            <input id="form_name" type="text" name="name" class="form-control" value="{{$teacher->name}}" required="required" data-error="Name is required.">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="form_age" class="mb-2">Age *</label>
                                                            <input id="form_age" type="number" name="age" class="form-control" value="{{$teacher->age}}" required="required" data-error="Age is required.">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="form_address" class="mb-2">Address *</label>
                                                    <textarea id="form_address" name="address" class="form-control" rows="2" required="required" data-error="Address is required.">{{$teacher->address}}</textarea>
                                                </div>


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="form_mobile" class="mb-2">Mobile *</label>
                                                            <input id="form_mobile" type="tel" name="mobile" class="form-control" value="{{$teacher->mobile}}" required="required" data-error="Mobile Number is required.">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                <div class="col-md-19 mt-2">
                                                <input type="submit" class="btn btn-success btn-send pt-2 btn-block mb-2" value="Submit">
                                                <input type="reset" class="btn btn-warning btn-send pt-2 btn-block mb-2" value="Reset">  
                                                </div>

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
