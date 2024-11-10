<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;

class BatchesController extends Controller
{
    /**
     * Display a listing of batches.
     */
    public function index()
    {
        // Fetch all batches with their related courses
        $batches = Batch::with('course')->get();
        
        // Pass the batches to the view
        return view('batches.list-batch', compact('batches'));
    }

    /**
     * Show the form for creating a new batch.
     */
    public function create()
    {
        // Fetch all courses for the dropdown
        $courses = Course::all();
        return view('batches.add-batch', compact('courses'));
    }

    /**
     * Store a newly created batch in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the input data
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'batch_name' => 'required|string|max:255',
            'start_date' => 'nullable|date',
        ]);

        // Create a new batch with the validated data
        Batch::create([
            'name' => $request->input('batch_name'),
            'course_id' => $request->input('course_id'),
            'start_date' => $request->input('start_date'), 
        ]);

        // Redirect to the list of batches with a success message
        return redirect()->route('batches.list')->with('status', 'Batch created successfully!');
    }

    /**
     * Show the specified batch.
     */
    public function show(string $id)
    {
        // Find the batch with its related course
        $batch = Batch::with('course')->find($id);

        if (!$batch) {
            return redirect()->route('batches.list')->with('error', 'Batch not found.');
        }

        // Pass the batch to the view
        return view('batches.view-batch', compact('batch'));
    }

    /**
     * Show the form for editing the specified batch.
     */
    public function edit($id)
    {
        // Find the batch and fetch all courses for the dropdown
        $batch = Batch::findOrFail($id);
        $courses = Course::all();

        // Pass the batch and courses to the view
        return view('batches.edit-batch', compact('batch', 'courses'));
    }

    /**
     * Update the specified batch in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validate the input data
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'batch_name' => 'required|string|max:255',
            'start_date' => 'nullable|date',
        ]);

        // Find the batch and update its attributes
        $batch = Batch::findOrFail($id);
        $batch->update([
            'name' => $request->input('batch_name'),
            'course_id' => $request->input('course_id'),
            'start_date' => $request->input('start_date'),
        ]);

        // Redirect to the list of batches with a success message
        return redirect()->route('batches.list')->with('status', 'Batch updated successfully!');
    }

    /**
     * Remove the specified batch from storage.
     */
    public function destroy(string $id)
    {
        $batch = Batch::find($id);
        
        if (!$batch) {
            return redirect()->route('batches.list')->with('error', 'Batch not found.');
        }

        $batch->delete();
        return redirect()->route('batches.list')->with('status', 'Batch deleted successfully!');
    }
}
