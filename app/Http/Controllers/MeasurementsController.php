<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Measurements;
use App\Models\Customer;

class MeasurementsController extends Controller
{
    /**
     * Store a newly created measurement record in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            
            'lambai' => 'required|string',
        'tera' => 'required|string',
        'bazu' => 'required|string',
        'kundah' => 'required|string',
        'galeh' => 'required|string',
        'chest' => 'required|string',
        'kamar' => 'required|string',
        'chest_tayyar' => 'required|string',
        'kamartiyaar' => 'required|string',
        'gohire_tayyar' => 'required|string',
        'shalwar_lambai' => 'required|string',
        'panche' => 'required|string',
        'chokor_ghera' => 'required|string',
        'gol_ghera' => 'required|string',
        'baba_bazu' => 'required|string',
        'kaff' => 'required|string',
        'lambai_kot' => 'required|string',
        'hip' => 'required|string',
            // Add validation rules for other measurement fields as needed
        ]);

        // Create a new measurement instance
        $measurement = new Measurements();

        // Assign values from the validated data to the measurement instance
       
        $measurement->lambai = $validatedData['lambai'];
        $measurement->tera = $validatedData['tera'];
        $measurement->bazu = $validatedData['bazu'];
        $measurement->kundah = $validatedData['kundah'];
        $measurement->galeh = $validatedData['galeh'];
        $measurement->chest = $validatedData['chest'];
        $measurement->kamar = $validatedData['kamar'];
        $measurement->chest_tayyar = $validatedData['chest_tayyar'];
        $measurement->kamartiyaar = $validatedData['kamartiyaar'];
        $measurement->gohire_tayyar = $validatedData['gohire_tayyar'];
        $measurement->shalwar_lambai = $validatedData['shalwar_lambai'];
        $measurement->panche = $validatedData['panche'];
        $measurement->chokor_ghera = $validatedData['chokor_ghera'];
        $measurement->gol_ghera = $validatedData['gol_ghera'];
        $measurement->baba_bazu = $validatedData['baba_bazu'];
        $measurement->kaff = $validatedData['kaff'];
        $measurement->lambai_kot = $validatedData['lambai_kot'];
        $measurement->hip = $validatedData['hip'];
        // Assign other measurement values similarly

        // Save the measurement record to the database
        $measurement->save();

        // Redirect to a response page or return a response as needed
        return redirect()->route('add-order')->with('success', 'Measurement record added successfully.');
    }

    public function index()
{
    // Fetch all data from the Measurements model
    $measurements = Measurements::all();
    
    // Fetch all data from the Customer model
    $customers = Customer::all();
    
    // Pass the fetched data to the view
    return view('view-edit-measurements', compact('measurements', 'customers'));
}

public function destroy($id)
    {
        $measurement = Measurements::findOrFail($id);
        $measurement->delete();

        return response()->json(['success' => 'Measurement record deleted successfully.']);
    }


    public function edit($id)
{
    $measurement = Measurements::findOrFail($id);
    return view('edit-measurements', compact('measurement'));
}


public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'lambai' => 'required|string',
        'tera' => 'required|string',
        'bazu' => 'required|string',
        'kundah' => 'required|string',
        'galeh' => 'required|string',
        'chest' => 'required|string',
        'kamar' => 'required|string',
        'chest_tayyar' => 'required|string',
        'kamartiyaar' => 'required|string',
        'gohire_tayyar' => 'required|string',
        'shalwar_lambai' => 'required|string',
        'panche' => 'required|string',
        'chokor_ghera' => 'required|string',
        'gol_ghera' => 'required|string',
        'baba_bazu' => 'required|string',
        'kaff' => 'required|string',
        'lambai_kot' => 'required|string',
        'hip' => 'required|string',
    ]);

    // Find the measurement by ID and update its values
    $measurement = Measurements::findOrFail($id);
    $measurement->lambai = $validatedData['lambai'];
    $measurement->tera = $validatedData['tera'];
    $measurement->bazu = $validatedData['bazu'];
    $measurement->kundah = $validatedData['kundah'];
    $measurement->galeh = $validatedData['galeh'];
    $measurement->chest = $validatedData['chest'];
    $measurement->kamar = $validatedData['kamar'];
    $measurement->chest_tayyar = $validatedData['chest_tayyar'];
    $measurement->kamartiyaar = $validatedData['kamartiyaar'];
    $measurement->gohire_tayyar = $validatedData['gohire_tayyar'];
    $measurement->shalwar_lambai = $validatedData['shalwar_lambai'];
    $measurement->panche = $validatedData['panche'];
    $measurement->chokor_ghera = $validatedData['chokor_ghera'];
    $measurement->gol_ghera = $validatedData['gol_ghera'];
    $measurement->baba_bazu = $validatedData['baba_bazu'];
    $measurement->kaff = $validatedData['kaff'];
    $measurement->lambai_kot = $validatedData['lambai_kot'];
    $measurement->hip = $validatedData['hip'];
    // Update other fields similarly

    // Save the measurement record to the database
    $measurement->save();

    // Redirect back with a success message
    return redirect()->route('view-edit-measurements')->with('success', 'Measurement updated successfully.');
}

}