<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::all();
        return view ('teacher.list-teachers',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('teacher.add-teacher');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teacher = new Teacher;
        $teacher->name      = $request->input('name');
        $teacher->age       = $request->input('age');
        $teacher->address   = $request->input('address');
        $teacher->mobile    = $request->input('mobile');
        $teacher->save();
        return redirect()->route('teachers.list')->withSuccess( 'Teacher added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id) 
    {
        $teacher = Teacher::find($id);
       
        return view('teacher.view-teacher')->with('teacher', $teacher);
    
       }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $teacher = Teacher::find($id); // Find teacher by ID
        if (!$teacher) {
            return redirect('/teachers')->with('error', 'Teacher not found.');
        }
        return view('teacher.edit-teacher', ['teacher' => $teacher]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the teacher by ID
        $teacher = Teacher::find($id);

        // Check if the teacher exists
        if (!$teacher) {
            return redirect()->route('teachers.list')->withErrors( 'Teacher not found.');
        }

        // Update the teacher's details
        $teacher->name    = $request->input('name');
        $teacher->age     = $request->input('age');
        $teacher->address = $request->input('address');
        $teacher->mobile  = $request->input('mobile');
        
        // Save the updated teacher data
        $teacher->update();

        // Redirect with a success message
        return redirect()->route('teachers.list')->withSuccess('Teacher data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect()->route('teachers.list')->with('teacher',$teacher);
    }
}
