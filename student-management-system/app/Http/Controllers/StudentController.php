<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch all students from the database
        $student = Student::all();
        // Pass the students to the view
        return view('students.list-students')->with('student', $student);
    }

    public function create()
    {
        return view('students.add-student');
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name      = $request->input('name');
        $student->age       = $request->input('age');
        $student->address   = $request->input('address');
        $student->mobile    = $request->input('mobile');
        $student->parent    = $request->input('parent');
        $student->parent_mobile = $request->input('parent_mobile');
        $student->save();
        return redirect()->route('students.list')->with('status', 'Student added successfully!');
    }

    public function edit($id) {
        $student = Student::find($id); // Find the student by id
    
        if (!$student) {
            // Handle the case where student is not found
            return redirect()->route('students.list')->with('error', 'Student not found.');
        }
    
        return view('students.edit-student', compact('student')); // Pass student data to the view
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->age = $request->input('age');
        $student->address = $request->input('address');
        $student->mobile = $request->input('mobile');
        $student->parent    = $request->input('parent');
        $student->parent_mobile = $request->input('parent_mobile');
        $student->update();
        return redirect()->route('students.list')->with('status','Student Updated Successfully');
    }

    public function show($id) 
{
    $student = Student::find($id);
   
    return view('students.view-student')->with('student', $student);

   }
   
   public function destroy($id)
   {
       $student = Student::find($id);
       $student->delete();
       return redirect()->route('students.list')->with('student',$student);
       
   }
}   

