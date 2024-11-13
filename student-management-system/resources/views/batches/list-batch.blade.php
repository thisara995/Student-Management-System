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
                    <h1 class="mt-4">BATCH SECTION</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{url('/batches')}}">Batch</a></li>
                        <li class="breadcrumb-item active">View Batches</li>
                    </ol>

                    @if (session('status'))
                        <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif 
                    
                    <div class="card mb-4">
                        <div class="card-body">
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Batch Name</th>
                                        <th>Course Name</th>
                                        <th>Start Date</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Batch Name</th>
                                        <th>Course Name</th>
                                        <th>Start Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($batches as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->course->name }}</td>
                                            <td>{{ $item->start_date }}</td> <!-- Fixed closing tag -->
                                            <td>
                                                <div class="btn-group">
                                                    <!-- View button with FontAwesome icon -->
                                                    <a href="{{ url('/batches/'.$item->id.'/view') }}" class="btn btn-secondary btn-sm me-2" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    
                                                    <!-- Edit button with FontAwesome icon -->
                                                    <a href="{{ url('/batches/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm me-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    
                                                    <!-- Delete button with FontAwesome icon -->
                                                    <form action="{{ url('/batches/'.$item->id.'/delete') }}" method="POST" id="delete-form-{{ $item->id }}" class="d-inline">
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
        function confirmDelete(itemId) {
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Course's data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // Submit the form
                    document.getElementById('delete-form-' + itemId).submit();
                    swal("Deleted!", "The Course has been deleted.", "success");
                } else {
                    swal("The Course data is safe!");
                }
            });
        }
    </script>

</body>
</html>
