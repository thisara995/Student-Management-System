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
                    <h1 class="mt-4">ENROLLMENT SECTION</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="">Enrollment</a></li>
                        <li class="breadcrumb-item active">View Enrollments</li>
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
                                        <th>Batch Name</th>
                                        <th>Student Name</th>
                                        <th>Join Date</th>
                                        <th>Fee</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Course Name</th>
                                        <th>Batch Name</th>
                                        <th>Student Name</th>
                                        <th>Join Date</th>
                                        <th>Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($enrollments as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->enroll_no  }}</td>
                                        <td>{{ $item->batch->name }}</td>
                                        <td>{{ $item->student->name }}</td>
                                        <td>{{ $item->join_date }}</td>
                                        <td> LKR.{{ $item->fee }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- View button with FontAwesome icon -->
                                                <a href="{{url('/enrollments/'.$item->id.'/view')}}" class="btn btn-secondary btn-sm me-2" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                
                                                <!-- Edit button with FontAwesome icon -->
                                                <a href="{{url('/enrollments/'.$item->id.'/edit')}}" class="btn btn-primary btn-sm me-2" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                
                                                <!-- Delete button with FontAwesome icon -->
                                                <form action="{{ url('/enrollments/'.$item->id.'/delete') }}" method="POST" id="delete-form-{{ $item->id }}" class="d-inline">
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
