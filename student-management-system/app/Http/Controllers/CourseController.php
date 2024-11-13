<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('teacher')->get();
        return view('course.list-courses')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('course.add-course', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'syllabus' => 'required|string',
            'duration' => 'required|numeric',
            'teacher' => 'required|exists:teachers,id',
        ]);

        Course::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'syllabus' => $request->input('syllabus'),
            'duration' => $request->input('duration'),
            'teacher_id' => $request->input('teacher'),
        ]);

        return redirect()->route('courses.list')->with('status', 'Course added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::with('teacher')->find($id);

        if (!$course) {
            return redirect()->route('courses.list')->with('error', 'Course not found.');
        }

        return view('course.view-course', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::with('teacher')->find($id);
        if (!$course) {
            return redirect()->route('courses.list')->with('error', 'Course not found.');
        }

        $teachers = Teacher::all();
        return view('course.edit-course', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'syllabus' => 'required|string',
            'duration'=> 'required|numeric',
            'teacher' => 'required|exists:teachers,id',
        ]);

        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.list')->with('error', 'Course not found.');
        }

        // Update course attributes
        $course->name = $request->input('name');
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->syllabus = $request->input('syllabus');
        $course->duration = $request->input('duration');
        $course->teacher_id = $request->input('teacher');

        // Save changes to the database
        $course->save();

        return redirect()->route('courses.list')->with('success', 'Course data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::find($id);
        
        if (!$course) {
            return redirect()->route('courses.list')->with('error', 'Course not found.');
        }

        $course->delete();
        return redirect()->route('courses.list')->with('success', 'Course deleted successfully!');
    }
}
