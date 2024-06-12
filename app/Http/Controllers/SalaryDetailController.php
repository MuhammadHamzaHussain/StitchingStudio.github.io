<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SalaryDetail;
use App\Models\DesignationDetail;
use App\Models\StaffDetail;

class SalaryDetailController extends Controller
{
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'staff_designation' => 'required',
            'staff_name' => 'required',
            'date' => 'required|date_format:d-m-Y',
            'amount' => 'required',
            'description' => 'required',
        ]);

        // Parse the date using Carbon
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        // Fetch the designation name based on the ID selected in the form
        $designation = DesignationDetail::findOrFail($request->input('staff_designation'));

        // Fetch the staff name based on the ID selected in the form
        $staff = StaffDetail::findOrFail($request->input('staff_name'));

        // Create a new salary detail if validation passes
        $salaryDetail = new SalaryDetail();
        $salaryDetail->staff_designation = $designation->designationName; // Save designation name instead of ID
        $salaryDetail->staff_name = $staff->name; // Save staff name instead of ID
        $salaryDetail->date = $date;
        $salaryDetail->amount = $request->input('amount');
        $salaryDetail->description = $request->input('description');
        $salaryDetail->save();

        return redirect()->route('pay-salary')->with('success', 'Salary added successfully!');
    }

    public function create()
    {
        $designationDetails = DesignationDetail::all();
        $staffDetails = StaffDetail::all();
        
        return view('pay-salary', compact('designationDetails', 'staffDetails'));
    }

    public function index()
    {
        $salaryDetails = SalaryDetail::all();
        return view('view-edit-pay-salary', compact('salaryDetails'));
    }

    public function destroy($id)
    {
        $salaryDetail = SalaryDetail::findOrFail($id);
        $salaryDetail->delete();

        return redirect()->route('view-edit-pay-salary')->with('success', 'Salary detail deleted successfully.');
    }

    public function edit($id)
    {
        $salaryDetail = SalaryDetail::findOrFail($id);
        $designationDetails = DesignationDetail::all();
        $staffDetails = StaffDetail::all();
        
        return view('edit-pay-salary', compact('salaryDetail', 'designationDetails', 'staffDetails'));
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $validatedData = $request->validate([
            'staff_designation' => 'required',
            'staff_name' => 'required',
            'date' => 'required|date_format:d-m-Y',
            'amount' => 'required',
            'description' => 'required',
        ]);

        // Parse the date using Carbon
        $date = Carbon::createFromFormat('d-m-Y', $request->input('date'))->format('Y-m-d');

        // Fetch the designation name based on the ID selected in the form
        $designation = DesignationDetail::findOrFail($request->input('staff_designation'));

        // Fetch the staff name based on the ID selected in the form
        $staff = StaffDetail::findOrFail($request->input('staff_name'));

        // Update the salary detail if validation passes
        $salaryDetail = SalaryDetail::findOrFail($id);
        $salaryDetail->staff_designation = $designation->designationName; // Save designation name instead of ID
        $salaryDetail->staff_name = $staff->name; // Save staff name instead of ID
        $salaryDetail->date = $date;
        $salaryDetail->amount = $request->input('amount');
        $salaryDetail->description = $request->input('description');
        $salaryDetail->save();

        return redirect()->route('view-edit-pay-salary')->with('success', 'Salary updated successfully!');
    }
}
