<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\Teacher;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalStudents = Student::count();
        $totalBatches = Batch::count();
        $totalCourses = Course::count();
        $totalEnrollments = Enrollment::count();
        $totalPayments = Payment::count();
        $totalTeachers = Teacher::count();
        $totalUsers = User::count();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalBatches',
            'totalCourses',
            'totalEnrollments',
            'totalPayments',
            'totalTeachers',
            'totalUsers'
        ));
    }
}
