<?php

namespace App\Http\Controllers;

// use App\Models\{User,Presidents};
 use Illuminate\Http\Request;

use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Presidents;

use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('clubs.index',['users'=>$users]);
    }
    public function indexA()
    {
        $users = User::all();
        return view('clubs.indexA',['users'=>$users]);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $presidents = Presidents::all();
        return view('clubs.create',['presidents'=>$presidents]);
    }



    public function store(Request $request)

{
    
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['nullable', 'string', 'max:255', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'phone' => ['nullable', 'string', 'max:255'],
        'address' => ['nullable', 'string', 'max:255'],
        'role' => ['required', 'in:admin,agent,user'],
        'presidents' => ['required', 'array', 'min:1'], // Ensure at least one president is selected
    ]);

    // Create the user
    $user = User::create([
        'name' => $request->input('name'),
        'username' => $request->input('username'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'phone' => $request->input('phone'),
        'address' => $request->input('address'),
        'role' => $request->input('role'),
    ]);

    // Attach presidents to the user
    $user->presidents()->attach($request->input('presidents', []));

    // Redirect with success message
    return redirect()->route('clubs.index')->with('success', 'User created successfully.');
    
}
    

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }


    

    public function edit(User $user)
{
    $presidents = Presidents::all();
    return view('clubs.edit', compact('user', 'presidents'));
}

    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
    
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'role' => ['required', 'in:admin,agent,user'],
            'presidents' => ['required', 'array', 'min:1'], // Ensure at least one president is selected
        ]);
    
        $user = User::findOrFail($user->id);

        // Update user information
        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'role' => $request->input('role'),
    
        ]);
        // Sync presidents with the user
        $user->presidents()->sync($request->input('presidents', []));
    
        // Redirect with success message
        return redirect()->route('clubs.index')->with('success', 'User updated successfully.');
    }

   





    public function destroy(User $user)
{
    $res = $user->presidents()->detach(); // Detach presidents
    $result = $user->delete(); // Delete the user

    if ($res !== false && $result) {
        return redirect()->route('clubs.index')->with('success', "User and associated presidents deleted successfully.");
    } else {
        return redirect()->route('clubs.index')->with('error', "Failed to delete user and associated presidents.");
    }
}
    public function destroyA(User $user)
{
    $res = $user->presidents()->detach(); // Detach presidents
    $result = $user->delete(); // Delete the user

    if ($res !== false && $result) {
        return redirect()->route('clubs.indexA')->with('success', "User and associated presidents deleted successfully.");
    } else {
        return redirect()->route('clubs.indexA')->with('error', "Failed to delete user and associated presidents.");
    }
}



}
