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
                <h1 class="mt-4 px-4">PAYMENTS SECTION</h1>
                <ol class="breadcrumb mb-4 px-4">
                    <li class="breadcrumb-item"><a href="">Payment</a></li>
                    <li class="breadcrumb-item active">View Payment</li>
                </ol>
                <div class="container mb-4 mt-2" style="max-width: 50rem;">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Payments Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <h6 class="card-title mb-3"><strong>Payment ID: </strong>{{ $payment->id }}</h6>
                            <h6 class="card-title mb-3"><strong>Enroll Number: </strong>{{ $payment->enrollment->enroll_no }}</h6>
                            <p class="card-text mb-3"><strong>Paid Date: </strong>{{ $payment->paid_date }}</p>
                            <p class="card-text mb-3"><strong>Amount: </strong>LKR  {{ $payment->amount }}</p>
                            <a href="{{ route('payments.list') }}" class="btn btn-outline-primary btn-block mt-4">Back to Payments</a>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <small>Updated {{ $payment->updated_at->diffForHumans() }}</small>
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
