<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\competitions;
use App\Models\Epreuves;
use App\Models\Athletes;
use App\Models\Athcomps;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AthcompsController extends Controller
{
    public function inscricomp()
    {

        // Fetch the authenticated user
        $user = Auth::user();
        // Fetch all epreuves to populate the select dropdown
        $epreuves = Epreuves::all();
        $athletes = Athletes::all();
        $competitions = competitions::all();

        return view('athcomps.inscricomp', compact('competitions','epreuves','athletes'));
    }



    public function athcompsAtt()
{
    // Retrieve the authenticated user
    $user = auth()->user();

    // Fetch athletes that belong to the authenticated user
    $athletes = Athletes::whereHas('users', function($query) use ($user) {
        $query->where('users.id', $user->id);
    })->get();

    // Fetch related athcomps, competitions, and epreuves
    $athcomps = Athcomps::whereHas('athletes', function($query) use ($user) {
        $query->whereHas('users', function($query) use ($user) {
            $query->where('users.id', $user->id);
        });
    })->get();

    // Fetch related competitions and epreuves
    $epreuves = Epreuves::all();
    $competitions = Competitions::all();

    // Return the view with the filtered data
    return view('athcomps.athcompsAtt', compact('competitions', 'epreuves', 'athletes', 'athcomps'));
}



    public function athcompsAcc()
    {
        
        // Retrieve the authenticated user
    $user = auth()->user();

    // Fetch athletes that belong to the authenticated user
    $athletes = Athletes::whereHas('users', function($query) use ($user) {
        $query->where('users.id', $user->id);
    })->get();

    // Fetch related athcomps, competitions, and epreuves
    $athcomps = Athcomps::whereHas('athletes', function($query) use ($user) {
        $query->whereHas('users', function($query) use ($user) {
            $query->where('users.id', $user->id);
        });
    })->get();

    // Fetch related competitions and epreuves
    $epreuves = Epreuves::all();
    $competitions = Competitions::all();

    // Return the view with the filtered data
    return view('athcomps.athcompsAcc', compact('competitions', 'epreuves', 'athletes', 'athcomps'));
      
    }


    public function athcompsRef()
    {
        
        // Retrieve the authenticated user
    $user = auth()->user();

    // Fetch athletes that belong to the authenticated user
    $athletes = Athletes::whereHas('users', function($query) use ($user) {
        $query->where('users.id', $user->id);
    })->get();

    // Fetch related athcomps, competitions, and epreuves
    $athcomps = Athcomps::whereHas('athletes', function($query) use ($user) {
        $query->whereHas('users', function($query) use ($user) {
            $query->where('users.id', $user->id);
        });
    })->get();

    // Fetch related competitions and epreuves
    $epreuves = Epreuves::all();
    $competitions = Competitions::all();

    // Return the view with the filtered data
    return view('athcomps.athcompsRef', compact('competitions', 'epreuves', 'athletes', 'athcomps'));
      
    }
    






    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'validation' => 'nullable|string|in:accept,en attente,refuse',
            'competitions' => 'nullable|exists:competitions,id',
            'athletes' => 'nullable|exists:athletes,id',
            'epreuves' => 'nullable|exists:epreuves,id',
        ]);
    
        // Create Athcomps instance
        $athcomps = Athcomps::create($validatedData);
    
        // Attach competitions, athletes, and epreuves to the Athcomps instance if provided
        if (isset($validatedData['competitions'])) {
            $athcomps->competitions()->attach($validatedData['competitions']);
        }
        if (isset($validatedData['athletes'])) {
            $athcomps->athletes()->sync($validatedData['athletes']);
        }
        if (isset($validatedData['epreuves'])) {
            $athcomps->epreuves()->attach($validatedData['epreuves']);
        }
    
        // Redirect with success message
        return redirect()->route('athcomps.athcompsAtt')->with('success', 'Athcomps created successfully.');
    }
    
    
    
}
