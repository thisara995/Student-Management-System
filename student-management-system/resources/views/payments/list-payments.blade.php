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
                <div class="container-fluid px-4">
                    <h1 class="mt-4">PAYMENT SECTION</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{url('/payments')}}">Payment</a></li>
                        <li class="breadcrumb-item active">View Payments</li>
                    </ol>

                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif 
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Enrollment Number</th>
                                        <th>Paid Date</th>
                                        <th>Amount</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Id</th>
                                        <th>Enrollment Number</th>
                                        <th>Paid Date</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($payments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->enrollment->enroll_no }}</td>
                                        <td>{{ $item->paid_date }}</td>
                                        <td> LKR.{{ number_format ($item->amount,2) }}</td>
                                        <td>
                                            <div class="btn-group">

                                            <a href="{{ route('payments.report', ['id' => $item->id]) }}" target="_blank" class="btn btn-success btn-sm me-2" title="Print">
                                            <i class="fas fa-print"></i>
                                            </a>

                                                <!-- View button with FontAwesome icon -->
                                                <a href="{{url('/payments/'.$item->id.'/view')}}" class="btn btn-secondary btn-sm me-2" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                
                                                <!-- Edit button with FontAwesome icon -->
                                                <a href="{{url('/payments/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                
                                                <!-- Delete button with FontAwesome icon -->
                                                <form action="{{ url('/payments/'.$item->id.'/delete') }}" method="POST" id="delete-form-{{ $item->id }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

    <script>
    function confirmDelete(enrollmentId) {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this Enrollment's data!",
            icon: "warning",
            dangerMode: true,
            buttons: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // If the user confirms, submit the form
                document.getElementById('delete-form-' + enrollmentId).submit();
                swal("Deleted!", "The Enrollment has been deleted.", "success");
            } else {
                swal("The Enrollment data is safe!");
            }
        });
    }
    </script>

</body>

</html>
