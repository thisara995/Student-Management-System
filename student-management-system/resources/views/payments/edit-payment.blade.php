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
                <h1 class="mt-4 px-4">PAYMENT SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="{{ url('/enrollments') }}">Payment</a></li>
                    <li class="breadcrumb-item active">Edit Payment</li>
                </ol>

                <div class="container mb-4 mt-2">
                    <div class="text-center">
                        <h3>Payment Edit Form</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card mt-2 mx-auto p-4 bg-light">
                                <div class="card-body bg-light">
                                    <form action="{{ route('payments.update', $payment->id) }}" method="post" id="payment-form" role="form" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                        <div class="controls">
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_enrollment_id" class="mb-2">Enrollment *</label>
                                                        <select id="form_enrollment_id" name="enrollment_id" class="form-control" required>
                                                            <option value="" disabled>Select an Enrollment *</option>
                                                            @foreach($enrollments as $enrollment)
                                                                <option value="{{ $enrollment->id }}" {{ $enrollment->id == $payment->enrollment_id ? 'selected' : '' }}>
                                                                    {{ $enrollment->enroll_no }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_paid_date" class="mb-2">Paid Date *</label>
                                                        <input id="form_paid_date" type="date" name="paid_date" class="form-control" value="{{ $payment->paid_date }}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_amount" class="mb-2">Amount *</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">LKR</span>
                                                            <input id="form_amount" type="number" name="amount" class="form-control" placeholder="Enter Amount *" value="{{ $payment->amount }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mt-3">
                                                <input type="submit" class="btn btn-success btn-send pt-2 btn-block mb-2 me-md-2" value="Update Payment">
                                                <a href="{{ route('payments.list') }}" class="btn btn-warning btn-send pt-2 btn-block mb-2">Cancel</a>
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
