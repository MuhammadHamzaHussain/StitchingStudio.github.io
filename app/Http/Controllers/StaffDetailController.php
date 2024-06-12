<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // Import the Carbon library
use Illuminate\Support\Facades\Validator;
use App\Models\StaffDetail;
use App\Models\DesignationDetail;


class StaffDetailController extends Controller
{

    public function index()
    {
        // Fetch all staff details
        $staffDetails = StaffDetail::all();

        // Pass staff details to the view
        return view('view-edit-staff', ['staffDetails' => $staffDetails]);
    }


    public function store(Request $request)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'designation' => 'required',
        'name' => 'required',
        'gender' => 'required',
        'dob' => 'required|date_format:d-m-Y',
        'mobile' => 'required',
        'joining_date' => 'required|date_format:d-m-Y',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'salary' => 'required',
    ]);

    // If validation fails, return the error messages
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        // Convert the date format from 'DD-MM-YYYY' to 'YYYY-MM-DD'
        $dob = Carbon::createFromFormat('d-m-Y', $request->input('dob'))->format('Y-m-d');
        $joiningDate = Carbon::createFromFormat('d-m-Y', $request->input('joining_date'))->format('Y-m-d');
    } catch (\Exception $e) {
        // Handle any exceptions thrown by Carbon
        return redirect()->back()->with('error', 'Invalid date format: ' . $e->getMessage())->withInput();
    }

    // Fetch the designation name based on the selected id
    $designationDetail = DesignationDetail::findOrFail($request->input('designation'));
    $designationName = $designationDetail->designationName;

    // Create a new staff detail with the converted date format and designation name
    $staffDetail = StaffDetail::create([
        'designation' => $designationName, // Save the name instead of ID
        'name' => $request->input('name'),
        'gender' => $request->input('gender'),
        'dob' => $dob, // Use the converted date format
        'mobile' => $request->input('mobile'),
        'joining_date' => $joiningDate, // Use the converted date format
        'address' => $request->input('address'),
        'city' => $request->input('city'),
        'state' => $request->input('state'),
        'salary' => $request->input('salary'),
    ]);

    // Redirect to the dashboard or any other appropriate page
    return redirect()->route('view-edit-staff')->with('success', 'Staff detail added successfully!');
}

    public function destroy($id)
{
    $staff = StaffDetail::findOrFail($id);
    $staff->delete();

    return redirect()->route('view-edit-staff')->with('success', 'Staff member deleted successfully!');
}


public function create()
    {
        // Fetch all designation details
        $designationDetails = DesignationDetail::all();

        // Pass only designation details to the view intended for adding staff
        return view('add-staff', ['designationDetails' => $designationDetails]);
    }














    public function edit($id)
{
    $staff = StaffDetail::findOrFail($id);
    $designationDetails = DesignationDetail::all();

    return view('edit-staff', [
        'staff' => $staff,
        'designationDetails' => $designationDetails
    ]);
}

public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'designation' => 'required',
        'name' => 'required',
        'gender' => 'required',
        'dob' => 'required|date_format:d-m-Y',
        'mobile' => 'required',
        'joining_date' => 'required|date_format:d-m-Y',
        'address' => 'required',
        'city' => 'required',
        'state' => 'required',
        'salary' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        $dob = Carbon::createFromFormat('d-m-Y', $request->input('dob'))->format('Y-m-d');
        $joiningDate = Carbon::createFromFormat('d-m-Y', $request->input('joining_date'))->format('Y-m-d');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Invalid date format: ' . $e->getMessage())->withInput();
    }

    $designationDetail = DesignationDetail::findOrFail($request->input('designation'));
    $designationName = $designationDetail->designationName;

    $staff = StaffDetail::findOrFail($id);
    $staff->update([
        'designation' => $designationName,
        'name' => $request->input('name'),
        'gender' => $request->input('gender'),
        'dob' => $dob,
        'mobile' => $request->input('mobile'),
        'joining_date' => $joiningDate,
        'address' => $request->input('address'),
        'city' => $request->input('city'),
        'state' => $request->input('state'),
        'salary' => $request->input('salary'),
    ]);

    return redirect()->route('view-edit-staff')->with('success', 'Staff detail updated successfully!');
}



}