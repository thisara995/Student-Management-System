<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Information and CSS Links -->
        @include('layouts.header')
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

                                    <!-- Display validation errors -->
                                        @if ($errors->any())
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <strong>@foreach ($errors->all() as $error)
                                                        {{ $error }}
                                                @endforeach</strong> 
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif


                                    <!-- Display success message -->
                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>{{ session('success') }}</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif
                                                                                                            
                                        <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{url('/admin/login')}}"  method="post" autocomplete="off" >
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- Forgot Password Link -->
                                                <a id="forgotPasswordLink" class="small" href="password.html" style="display:none;">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <!-- Footer -->
                @include('layouts.footer')
            </div>
        </div>
        <!-- Scripts -->
        @include('layouts.scripts')

        <script>
            // JavaScript to show/hide Forgot Password link based on admin email
            document.getElementById('inputEmail').addEventListener('input', function() {
                const adminEmail = 'admin@example.com'; // Replace with the actual admin email
                const inputEmail = this.value;
                const forgotPasswordLink = document.getElementById('forgotPasswordLink');

                // Show the link if the input email matches the admin email
                if (inputEmail === adminEmail) {
                    forgotPasswordLink.style.display = 'block';
                } else {
                    forgotPasswordLink.style.display = 'none';
                }
            });
        </script>
    </body>
</html>
