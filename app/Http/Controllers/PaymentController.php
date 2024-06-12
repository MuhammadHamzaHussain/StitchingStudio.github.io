<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'order_id' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'paid' => 'required|string|max:255',
            'date' => 'required|date_format:d-m-Y',
        ]);

        // Parse the date using Carbon
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        // Create a new payment record if validation passes
        $payment = Payment::create([
            'order_id' => $request->input('order_id'),
            'customer_name' => $request->input('customer_name'),
            'amount' => $request->input('amount'),
            'paid' => $request->input('paid'),
            'date' => $date, // Use the parsed date here
        ]);

        // Redirect to a success page or any other appropriate page
        return redirect()->route('view-edit-orders')->with('success', 'Payment added successfully!');
    }
}
