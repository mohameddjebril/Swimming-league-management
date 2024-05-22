<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function AgentDashboard()
    {
        return view('agent.index');
    }

    public function AgentLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function AgentLogin()
    {
        return view('agent.agent_login');
    }

    public function AgentProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_profile_view', compact('profileData'));
    }

    public function AgentProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('upload/agent_img'), $filename);
            $data->photo = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Agent Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AgentChangePassword(Request $request)
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('agent.agent_changepassword', compact('profileData'));
    }

    public function AgentUpdatePassword(Request $request)
    {
        // Validation
        $request->validate([
            'Old_Password' => 'required',
            'New_Password' => 'required|confirmed'
        ]);

        // Match the old password
        if (!Hash::check($request->Old_Password, Auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password does not match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update the new password
        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->New_Password)
        ]);
        
        $notification = array(
            'message' => 'Password changed successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }



}
