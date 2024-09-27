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
                                <h1 class="mt-4">TEACHER SECTION</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="{{ url('/teachers') }}">Student</a></li>
                                    <li class="breadcrumb-item active">View Teachers</li>
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
                                                    <th>Teacher Name</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>Mobile</th>
                                                    <th>Action</th> 
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>Id</th>
                                                    <th>Teacher Name</th>
                                                    <th>Age</th>
                                                    <th>Address</th>
                                                    <th>Mobile</th>
                                                    <th>Action</th> 
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                @foreach ($teacher as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td>
                                        <a href="{{ url('/teachers/'.$item->id.'/view') }}" class="btn btn-secondary btn-sm">View</a>
                                        <a href="{{ url('/teachers/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                                        
                                        <!-- Update delete form -->
                                        <form action="{{ url('/teachers/'.$item->id.'/delete') }}" method="POST" id="delete-form-{{ $item->id }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})">Delete</button>
                                        </form>
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
function confirmDelete(studentId) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this student's data!",
        icon: "warning",
        dangerMode: true,
        buttons: true,
        
    })
    .then((willDelete) => {
        if (willDelete) {
            // If the user confirms, submit the form
            document.getElementById('delete-form-' + studentId).submit();
            swal("Deleted!", "The student has been deleted.", "success");
        } else {
            swal("The student data is safe!");
        }
    });
}
</script>

</body>

</html>
