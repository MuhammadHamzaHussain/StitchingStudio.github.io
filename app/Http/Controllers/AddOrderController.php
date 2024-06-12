<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AddOrder;
use Carbon\Carbon; // Import the Carbon library
use App\Models\StaffDetail;
use App\Models\DesignationDetail;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Image;

class AddOrderController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data, including date format
        $validatedData = $request->validate([
            'customer_name' => 'required|max:255',
            'received_by' => 'required|max:255',
            'doc' => 'required|date_format:d-m-Y', // Ensure date is in 'DD-MM-YYYY' format
            'noOfSuits' => 'required|numeric',
            'amount' => 'required',
            'description' => 'nullable|max:1000',
            'profit' => 'required|numeric',
            'completed' => 'required'
        ]);

        // Initialize a new AddOrder instance
        $order = new AddOrder();

        try {
            // Assign values from the validated data to the order instance
            $order->customer_name = $validatedData['customer_name'];
            $order->received_by = $validatedData['received_by'];
            // Convert the date format from 'DD-MM-YYYY' to 'YYYY-MM-DD'
            $doc = Carbon::createFromFormat('d-m-Y', $validatedData['doc'])->format('Y-m-d');
            $order->doc = $doc; // Assign the converted date
            $order->noOfSuits = $validatedData['noOfSuits'];
            $order->amount = $validatedData['amount'];
            $order->description = $validatedData['description'];
            $order->profit = $validatedData['profit'];
            $order->completed = $validatedData['completed'];
            // Save the order record
            $order->save();
            return redirect()->route('dashboard')->with('success', 'Order added successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions thrown by Carbon or during save
            return redirect()->route('dashboard')->with('error', 'Failed to add order: ' . $e->getMessage());
        }
    }

    public function create()
    {
        // Fetch all staff details where the designation is 'Tailor'
        $staffNames = StaffDetail::whereHas('designationDetail', function($query) {
            $query->where('designationName', 'Tailor');
        })->get(['name', 'id']);
        // Fetch all customer details ordered by creation date in descending order
        $customerDetails = Customer::orderBy('created_at', 'desc')->get();
        // Get the most recently added customer's ID
        $recentCustomerId = $customerDetails->first()->id ?? null;
        // Return to the view with staff names, customer details, and the most recent customer ID
        return view('add-order', [
            'staffNames' => $staffNames,
            'customerDetails' => $customerDetails,
            'recentCustomerId' => $recentCustomerId,
        ]);
    }

    public function index(Request $request, $status = null)
{
    $query = AddOrder::with(['payments']);

    if ($status !== null) {
        $query->where('completed', $status);
    }

    $orders = $query->get();
    $customers = Customer::all();
    $images = Image::all();

    // Calculate balance for each order and filter based on balance if needed
    $filteredOrders = $orders->filter(function($order) use ($request) {
        $order->paid = $order->payments->sum('paid');
        $order->balance = $order->amount - $order->paid;

        if ($request->has('balance') && $request->input('balance') == 'greater-than-zero') {
            return $order->balance > 0;
        }

        return true;
    });

    return view('view-edit-orders', [
        'customers' => $customers,
        'orders' => $filteredOrders,
        'images' => $images,
    ]);
}



public function showReceipt(Request $request)
{
    $order_id = $request->input('order_id');
    $customer_name = $request->input('customer_name');
    $contact_number = $request->input('contact_number');
    $received_by = $request->input('received_by');
    $doc = $request->input('doc');
    $description = $request->input('description');
    $noOfSuits = $request->input('noOfSuits');
    $amount = $request->input('amount');
    $paid = $request->input('paid');
    $balance = $request->input('balance');
    $image = Image::where('id', $order_id)->first();
    // Fetch additional order details if needed
    $order = AddOrder::find($order_id);
    
    return view('receipt', compact('order_id', 'customer_name', 'contact_number', 'received_by', 'doc', 'description', 'noOfSuits', 'amount', 'paid', 'balance', 'order', 'image'));
}


    public function destroy($id)
    {
        $order = AddOrder::findOrFail($id);
        $order->delete();

        return response()->json(['success' => 'Order deleted successfully.']);
    }


    public function edit($id)
{
    $order = AddOrder::find($id);
    if (!$order) {
        return redirect()->route('view-edit-orders')->with('error', 'Order not found.');
    }

    // Fetch all staff details where the designation is 'Tailor'
    $staffNames = StaffDetail::whereHas('designationDetail', function($query) {
        $query->where('designationName', 'Tailor');
    })->get(['name', 'id']);
    // Fetch all customer details ordered by creation date in descending order
    $customerDetails = Customer::orderBy('created_at', 'desc')->get();

    return view('edit-orders', [
        'order' => $order,
        'staffNames' => $staffNames,
        'customerDetails' => $customerDetails
    ]);
}



public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'customer_name' => 'required|max:255',
        'received_by' => 'required|max:255',
        'doc' => 'required|date_format:d-m-Y',
        'noOfSuits' => 'required|numeric',
        'amount' => 'required',
        'description' => 'nullable|max:1000',
        'profit' => 'required|numeric',
        'completed' => 'required'
    ]);

    $order = AddOrder::find($id);
    if (!$order) {
        return redirect()->route('view-edit-orders')->with('error', 'Order not found.');
    }

    try {
        $order->customer_name = $validatedData['customer_name'];
        $order->received_by = $validatedData['received_by'];
        $order->doc = Carbon::createFromFormat('d-m-Y', $validatedData['doc'])->format('Y-m-d');
        $order->noOfSuits = $validatedData['noOfSuits'];
        $order->amount = $validatedData['amount'];
        $order->description = $validatedData['description'];
        $order->profit = $validatedData['profit'];
        $order->completed = $validatedData['completed'];
        $order->save();

        return redirect()->route('view-edit-orders')->with('success', 'Order updated successfully.');
    } catch (\Exception $e) {
        return redirect()->route('view-edit-orders')->with('error', 'Failed to update order: ' . $e->getMessage());
    }
}




    

}