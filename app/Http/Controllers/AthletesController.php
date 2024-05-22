<?php

namespace App\Http\Controllers;
use App\Models\Athletes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AthletesController extends Controller
{
    
    public function index()
{
    $user = auth()->user();
    $athletes = Athletes::whereHas('users', function($query) use ($user) {
        $query->where('users.id', $user->id);
    })->get();

    return view('agent.athletes.index', compact('athletes'));
}

    
    
    //---------------------------------------------------------
    
    public function indexAcceptATH()
    {
        $user = auth()->user();
        $athletes = Athletes::whereHas('users', function($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();
    
        return view('agent.athletes.indexAcceptATH', compact('athletes'));
    }
    

    public function indexAttenteATH()
    {
        
        $user = auth()->user();
        $athletes = Athletes::whereHas('users', function($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();

        return view('agent.athletes.indexAttenteATH', compact('athletes'));
      
    }
    public function indexRejectATH()
    {
        
        $user = auth()->user();
        $athletes = Athletes::whereHas('users', function($query) use ($user) {
            $query->where('users.id', $user->id);
        })->get();

        return view('agent.athletes.indexRejectATH', compact('athletes'));
      
    }
    


// -------------------------------------------------------------


    public function show(Athletes $athletes)
    {
        return view('agent.athletes.show', compact('athletes'));
    }
    

   

    public function create()
    {
        $users = User::all(); // Fetch all users
        return view('agent.athletes.create', compact('users'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'date_naissance' => 'required|date',
        'n_carte' => 'nullable|string|unique:athletes,n_carte',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max size 2MB
        'groupage' => 'nullable|string',
        'adress' => 'nullable|string',
        'email' => 'nullable|email|unique:athletes,email',
        'n_telephone' => 'nullable|string|unique:athletes,n_telephone',
        'categorie' => 'nullable|string',
        'date_debut' => 'nullable|date',
        'date_fin' => 'nullable|date|after_or_equal:date_debut',
        'validation' => 'nullable|string|in:accept,en attente,refuse',
        'temp_eng' => 'nullable|string',
        'genre' => 'nullable|string',
        'club_name' => 'nullable|string',
    ]);

    // Handle file upload for photo
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = date('Ymdhi') . $file->getClientOriginalName();
        $file->move(public_path('upload/admin_img'), $filename);
        $validatedData['photo'] = $filename; // Update the validated data with the photo filename
    }


    $user = Auth::user();

    // Ensure that $user is not null before accessing its properties
    if ($user) {
        $validatedData['club_name'] = $user->name;
    } else {
        // Handle the case when there is no authenticated user
        return redirect()->back()->with('error', 'No authenticated user found.');
    }

    // Create Athlete instance
    $athletes = Athletes::create($validatedData);

    if ($athletes) {
        // Attach the authenticated user (club) to the athlete
        $athletes->users()->attach(Auth::id());

        return redirect()->route('agent.athletes.index')->with('success', 'Athlete created successfully.');
    } else {
        return redirect()->back()->with('error', 'Failed to create athlete. Please try again.');
    }
}
 
public function edit($id)
{
    $athletes = Athletes::findOrFail($id);
    $users = User::where('role', 'agent')->get(); // Fetch users with role 'agent'
    return view('agent.athletes.edit', compact('athletes', 'users'));
}



//    public function edit(Athletes $athletes)
//     {
//         $user = User::all();
//         return view('athletes.edit',compact('athletes','user'));
//     }
public function update(Request $request, $id)
{
    // Find the existing athlete by ID
    $athlete = Athletes::findOrFail($id);

    // Validate the incoming request data
    $validatedData = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'date_naissance' => 'required|date',
        'n_carte' => 'nullable|string|unique:athletes,n_carte,' . $athlete->id,
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max size 2MB
        'groupage' => 'nullable|string',
        'adress' => 'nullable|string',
        'email' => 'nullable|email|unique:athletes,email,' . $athlete->id,
        'n_telephone' => 'nullable|string|unique:athletes,n_telephone,' . $athlete->id,
        'categorie' => 'nullable|string',
        'date_debut' => 'nullable|date',
        'date_fin' => 'nullable|date|after_or_equal:date_debut',
        'validation',
        'temp_eng' => 'nullable|string',
        'genre' => 'nullable|string',
    ]);

    // Handle file upload for photo
    if ($request->hasFile('photo')) {
        // Delete the old photo if it exists
        if ($athlete->photo) {
            $oldPhotoPath = public_path('upload/admin_img/' . $athlete->photo);
            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }

        // Save the new photo
        $file = $request->file('photo');
        $filename = date('Ymdhi') . $file->getClientOriginalName();
        $file->move(public_path('upload/admin_img'), $filename);
        $validatedData['photo'] = $filename; // Update the validated data with the new photo filename
    }


    // Set the validation status to 'en attente'
    $validatedData['validation'] = 'en attente';

    // Update the athlete instance with validated data
    $athlete->update($validatedData);

    // Redirect back with success message
    return redirect()->route('agent.athletes.index')->with('success', 'Athlete updated successfully.');
}





    // public function destroy(Athletes $athletes)
    // {
    //     $result = $athletes->delete();
    //     if ($result) {
            
    //         return redirect()->route('agent.athletes.index')->with('success',"athletes supprimé avec sucèss");
    //     }else{
    //         return redirect()->route('agent.athletes.index')->with('error',"Erreur lors de suppression de l'athlete");
    //     }
    // }




   public function destroy($id)
{
    // Find the existing athlete by ID
    $athlete = Athletes::findOrFail($id);

    // Delete the associated photo if it exists
    if ($athlete->photo) {
        $photoPath = public_path('upload/admin_img/' . $athlete->photo);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

    // Detach any relationships (if applicable)
    // For example, if there's a relationship with users:
    $athlete->users()->detach();

    // Delete the athlete record
    $athlete->delete();

    // Redirect back with success message
    return redirect()->route('agent.athletes.index')->with('success', 'Athlete deleted successfully.');
}


}
