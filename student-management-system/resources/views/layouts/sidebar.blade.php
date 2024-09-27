<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <!-- Dashboard Section -->
                <div class="sb-sidenav-menu-heading">Dashboard Section</div>
                <a class="nav-link" href="{{url('/admin/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>
                
                <!-- Student Section -->
                <div class="sb-sidenav-menu-heading">Student Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStudent" aria-expanded="false" aria-controls="collapseStudent">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Student
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseStudent" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ url('/students/add') }}">Add Student</a>
                        <a class="nav-link" href="{{ url('students/{student}/edit') }}">Edit Student</a>
                        <a class="nav-link" href="{{ url('/students') }}">View Students</a>
                    </nav>
                </div>

                <!-- Teacher Section -->
                <div class="sb-sidenav-menu-heading">Teacher Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTeacher" aria-expanded="false" aria-controls="collapseTeacher">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Teachers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTeacher" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/teachers/add')}}">Add Teacher</a>
                        <a class="nav-link" href="{{url('/teachers/{id}/edit')}}">Edit Teacher</a>
                        <a class="nav-link" href="{{url('/teachers')}}">View Teachers</a>
                    </nav>
                </div>

                <!-- Course Section -->
                <div class="sb-sidenav-menu-heading">Course Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCourses" aria-expanded="false" aria-controls="collapseCourses">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Courses
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCourses" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('courses/add')}}">Add Course</a>
                        <a class="nav-link" href="{{url('/courses/{id}/edit')}}">Edit Course</a>
                        <a class="nav-link" href="{{url('/courses')}}">View Courses</a>
                    </nav>
                </div>

                <!-- Enrollment Section -->
                <div class="sb-sidenav-menu-heading">Enrollment Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEnrollments" aria-expanded="false" aria-controls="collapseEnrollments">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Enrollments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEnrollments" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="enrollment-add.html">Add Enrollment</a>
                        <a class="nav-link" href="enrollment-view.html">View Enrollments</a>
                    </nav>
                </div>

                <!-- Payment Section -->
                <div class="sb-sidenav-menu-heading">Payment Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePayments" aria-expanded="false" aria-controls="collapsePayments">
                    <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                    Payments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePayments" aria-labelledby="headingFive" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="payment-view.html">View Payments</a>
                    </nav>
                </div>

                <!-- Users Section -->
                <div class="sb-sidenav-menu-heading">Users Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingSix" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="user-add.html">Add User</a>
                        <a class="nav-link" href="user-edit.html">Edit User</a>
                        <a class="nav-link" href="user-view.html">View Users</a>
                    </nav>
                </div>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            
        </div>
    </nav>
</div>
