<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Dashboard Section</div>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>
                
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

                <div class="sb-sidenav-menu-heading">Teacher Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTeacher" aria-expanded="false" aria-controls="collapseTeacher">
                    <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    Teachers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTeacher" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="teacher-add.html">Add Teacher</a>
                        <a class="nav-link" href="teacher-edit.html">Edit Teacher</a>
                        <a class="nav-link" href="teacher-view.html">View Teachers</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Course Section</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCourses" aria-expanded="false" aria-controls="collapseCourses">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Courses
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCourses" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="course-add.html">Add Course</a>
                        <a class="nav-link" href="course-edit.html">Edit Course</a>
                        <a class="nav-link" href="course-view.html">View Courses</a>
                    </nav>
                </div>

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

            </div>
        </div>
        <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <div>
    </nav>
</div>
