<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\competitions;
use App\Models\Epreuves;

class CompetitionsController extends Controller
{
    public function index()
    {
        $competitions = competitions::all();
        return view('competitions.index',['competitions'=>$competitions]);
    }
    public function indexLcomp()
    {
        $competitions = competitions::all();
        return view('competitions.indexLcomp',['competitions'=>$competitions]);
    }


    public function create()
    {
        // Fetch all epreuves to populate the select dropdown
        $epreuves = Epreuves::all();

        return view('competitions.create', compact('epreuves'));
    }


    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'titre' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'delaiinsc' => 'required|string|max:255',
            'sessions' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'epreuves' => 'required|array',
            'epreuves.*' => 'exists:epreuves,id',
        ];

        // Validate the request data
        $request->validate($rules);

        // Create the competition
        $competitions = Competitions::create([
            'titre' => $request->input('titre'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'delaiinsc' => $request->input('delaiinsc'),
            'sessions' => $request->input('sessions'),
            'genre' => $request->input('genre'),
            'categorie' => $request->input('categorie'),
            'lieu' => $request->input('lieu'),
        ]);

        // Attach epreuves to the competition
        $competitions->epreuves()->attach($request->input('epreuves'));

        // Redirect back with success message
        return redirect()->route('competitions.index')->with('success', 'Competition ajoutée avec succès.');
    }

    public function edit($id)
{
    // Fetch the competition by ID
    $competition = Competitions::findOrFail($id);

    // Load all epreuves to populate the select dropdown
    $epreuves = Epreuves::all();

    // Pass the competition and epreuves data to the view
    return view('competitions.edit', compact('competition', 'epreuves'));
}


public function update(Request $request, $id)
{
    // Validation rules
    $rules = [
        'titre' => 'required|string|max:255',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date|after_or_equal:date_debut',
        'delaiinsc' => 'required|string|max:255',
        'sessions' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'categorie' => 'required|string|max:255',
        'lieu' => 'required|string|max:255',
        'epreuves' => 'required|array',
        'epreuves.*' => 'exists:epreuves,id',
    ];

    // Validate the request data
    $request->validate($rules);

    // Find the competition by ID
    $competitions = Competitions::findOrFail($id);

    // Update the competition
    $competitions->update([
        'titre' => $request->input('titre'),
        'date_debut' => $request->input('date_debut'),
        'date_fin' => $request->input('date_fin'),
        'delaiinsc' => $request->input('delaiinsc'),
        'sessions' => $request->input('sessions'),
        'genre' => $request->input('genre'),
        'categorie' => $request->input('categorie'),
        'lieu' => $request->input('lieu'),
    ]);

    // Sync epreuves to the competition
    $competitions->epreuves()->sync($request->input('epreuves'));

    // Redirect back with success message
    return redirect()->route('competitions.index')->with('success', 'Competition modifiée avec succès.');
}



public function destroy(Competitions $competitions)
{
    // Delete the competition
    $competitions->delete();

    // Redirect back with success message
    return redirect()->route('competitions.index')->with('success', 'Competition supprimée avec succès.');
}

    
}
