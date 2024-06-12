<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesignationDetail;

class DesignationDetailController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'designationName' => 'required',
        ]);

        // Create a new designation detail if validation passes
        $designationDetail = DesignationDetail::create([
            'designationName' => $request->input('designationName'),
        ]);

        // Redirect to the dashboard or any other appropriate page
        return redirect()->route('view-edit-designation')->with('success', 'Designation added successfully!');
    }

    public function index()
    {
        // Fetch all designation details
        $designationDetails = DesignationDetail::all();
    
        // Pass designation details to the view
        return view('view-edit-designation', ['designationDetails' => $designationDetails]);
    }

    public function destroy($id)
{
    $designation = DesignationDetail::findOrFail($id);
    $designation->delete();

    return response()->json(['success' => 'Designation deleted successfully!']);
}

public function edit($id)
{
    // Fetch the designation detail by ID
    $designation = DesignationDetail::findOrFail($id);

    // Pass the designation detail to the view
    return view('edit-designation', compact('designation'));
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'designationName' => 'required',
    ]);

    // Find the designation by ID and update it
    $designation = DesignationDetail::findOrFail($id);
    $designation->update([
        'designationName' => $request->input('designationName'),
    ]);

    return response()->json(['success' => 'Designation updated successfully!']);
}



    
}