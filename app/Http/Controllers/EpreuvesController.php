<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuves;

class EpreuvesController extends Controller
{
    public function index()
    {
        $epreuves = Epreuves::all();
        return view('epreuves.index', compact('epreuves'));
    }

    public function create()
    {
        return view('epreuves.create');
    }

    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'typeEpr' => 'required|string',
        'nomEPR' => 'required_if:typeEpr,individual|string|nullable',
        'distance' => 'required_if:typeEpr,individual|array|nullable',
        'description' => 'required_if:typeEpr,collective|string|nullable',
    ]);

    // Process the distance field if it's an array
    if ($request->has('distance') && is_array($request->distance)) {
        $distance = implode(', ', $request->distance);
    } else {
        $distance = $request->distance;
    }

    // Create a new Epreuves instance and save the data
    $epreuves = new Epreuves;
    $epreuves->typeEpr = $request->typeEpr;
    $epreuves->nomEPR = $request->typeEpr === 'individual' ? $request->nomEPR : null;
    $epreuves->distance = $request->typeEpr === 'individual' ? $distance : null;
    $epreuves->description = $request->typeEpr === 'collective' ? $request->description : null;
    $epreuves->save();

    // Redirect back with a success message
    return redirect()->route('epreuves.index')->with('success', 'Epreuve saved successfully!');
}
public function edit($id)
    {
        $epreuve = Epreuves::findOrFail($id);
        return view('epreuves.edit', compact('epreuve'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'typeEpr' => 'required|string',
            'nomEPR' => 'required_if:typeEpr,individual|string|nullable',
            'distance' => 'required_if:typeEpr,individual|array|nullable',
            'description' => 'required_if:typeEpr,collective|string|nullable',
        ]);

        // Process the distance field if it's an array
        if ($request->has('distance') && is_array($request->distance)) {
            $distance = implode(', ', $request->distance);
        } else {
            $distance = $request->distance;
        }

        // Find the Epreuves instance and update the data
        $epreuve = Epreuves::findOrFail($id);
        $epreuve->typeEpr = $request->typeEpr;
        $epreuve->nomEPR = $request->typeEpr === 'individual' ? $request->nomEPR : null;
        $epreuve->distance = $request->typeEpr === 'individual' ? $distance : null;
        $epreuve->description = $request->typeEpr === 'collective' ? $request->description : null;
        $epreuve->save();

        // Redirect back with a success message
        return redirect()->route('epreuves.index')->with('success', 'Epreuve updated successfully!');
    }

    public function destroy($id)
    {
        $epreuve = Epreuves::findOrFail($id);
        $epreuve->delete();

        return redirect()->route('epreuves.index')->with('success', 'Epreuve deleted successfully!');
    }
}
