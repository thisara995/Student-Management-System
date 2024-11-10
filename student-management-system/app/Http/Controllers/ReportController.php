<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use mPDF;

class ReportController extends Controller
{
    public function report($pid)
    {
        // Fetch the payment record by ID
        $payment = Payment::find($pid);
    
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }
        
        // Use mPDF to render the HTML to PDF
        $mpdf = new \Mpdf\Mpdf();
        
        // Render the view to HTML
        $html = view('reports.payment_receipt', compact('payment'))->render();

        // Write HTML to the PDF
        $mpdf->WriteHTML($html);
        
        // Output the generated PDF
        return $mpdf->Output('payment_receipt.pdf', 'I'); // 'I' for inline display in browser
    }
}
