<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Batch;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'batch'])->get();
        return view('enrollments.list-enrollments', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $batches = Batch::all();
        return view('enrollments.add-enrollment', compact('students', 'batches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enroll_no' => 'required|string',
            'batch_id' => 'required|integer|exists:batches,id',
            'student_id' => 'required|integer|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        Enrollment::create($request->all());

        return redirect()->route('enrollments.list')->with('success', 'Enrollment created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enrollment = Enrollment::with(['student', 'batch'])->findOrFail($id);
        return view('enrollments.view-enrollment', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $students = Student::all();
        $batches = Batch::all();
        return view('enrollments.edit-enrollment', compact('enrollment', 'students', 'batches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'enroll_no' => 'required|string',
            'batch_id' => 'required|integer|exists:batches,id',
            'student_id' => 'required|integer|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->all());

        return redirect()->route('enrollments.list')->with('success', 'Enrollment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->delete();

        return redirect()->route('enrollments.list')->with('success', 'Enrollment deleted successfully!');
    }
}
