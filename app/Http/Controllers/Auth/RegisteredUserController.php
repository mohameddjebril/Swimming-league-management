<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME);
    // }




    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['nullable', 'string', 'max:255', 'unique:users'], // Add validation rule for username
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Add validation rule for photo
            'phone' => ['nullable', 'string', 'max:255'], // Add validation rule for phone
            'address' => ['nullable', 'string', 'max:255'], // Add validation rule for address
            'role' => ['required', 'in:admin,agent,user'], // Add validation rule for role
            'status' => ['required', 'in:active,unactive'], // Add validation rule for status
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'photo' => $request->photo,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'status' => $request->status,
        ]);
    
        event(new Registered($user));
    
        Auth::login($user);
    
        $url='';
         if($request->user()->role === 'admin'){
            $url='admin/dashboard';
         } elseif ($request->user()->role === 'agent'){
            $url='agent/dashboard';
         } elseif($request->user()->role === 'user'){
            $url='/dashboard';
         }       


        return redirect()->intended($url);
    }


}
