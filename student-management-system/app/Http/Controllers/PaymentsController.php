<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with(['enrollment'])->get();
        return view('payments.list-payments', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = Enrollment::all();
        return view('payments.add-payment', compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create([
            'enrollment_id' => $request->enrollment_id,
            'paid_date' => $request->paid_date,
            'amount' => $request->amount,
        ]);

        return redirect()->route('payments.list')->with('success', 'Payment recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::with('enrollment')->findOrFail($id);
        return view('payments.view-payment', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);
        $enrollments = Enrollment::all();
        return view('payments.edit-payment', compact('payment', 'enrollments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->update([
            'enrollment_id' => $request->enrollment_id,
            'paid_date' => $request->paid_date,
            'amount' => $request->amount,
        ]);

        return redirect()->route('payments.list')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return redirect()->route('payments.list')->with('success', 'Payment deleted successfully.');
    }
}
