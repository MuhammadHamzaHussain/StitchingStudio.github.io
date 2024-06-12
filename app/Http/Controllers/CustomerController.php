<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'customer_name' => 'required',
            'contact_number' => 'required',
        ]);
    
        // Create a new customer if validation passes
        $customer = Customer::create([
            'customer_name' => $request->input('customer_name'),
            'contact_number' => $request->input('contact_number'),
        ]);
    
        

    
        // Redirect to the add-measurements page
        return redirect()->route('add-measurements');
    }
    

    public function index()
    {
        // Fetch all customer details from the database
        $customerDetails = Customer::all();

        // Pass the fetched customer details to the view
        return view('view-edit-customers', ['customerDetails' => $customerDetails]);
    }

    public function destroy($id)
    {
        // Find the customer by ID
        $customer = Customer::findOrFail($id);

        // Delete the customer
        $customer->delete();

        // Redirect to the index page with a success message
        return redirect()->route('view-edit-customers')->with('success', 'Customer deleted successfully!');
    }

    

     



    public function edit($id)
{
    // Find the customer by ID
    $customer = Customer::findOrFail($id);

    // Pass the customer details to the view
    return view('edit-customer', ['customer' => $customer]);
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'customer_name' => 'required',
        'contact_number' => 'required',
    ]);

    // Find the customer by ID
    $customer = Customer::findOrFail($id);

    // Update the customer details
    $customer->update([
        'customer_name' => $request->input('customer_name'),
        'contact_number' => $request->input('contact_number'),
    ]);

    // Redirect to the view-edit-customers page with a success message
    return redirect()->route('view-edit-customers')->with('success', 'Customer updated successfully!');
}

    

}