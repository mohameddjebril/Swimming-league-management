<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Athletes;
use App\Models\Athcomps;
use App\Models\competitions;
use App\Models\Epreuves;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');

    }// end methode


    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }// end methode


    public function AdminLogin()
    {
        return view('admin.admin_login');
    }// end methode
     
    public function AdminProfile()
    {
        $id = Auth::User()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }// end methode


    public function AdminProfileStore (Request $request)
    {
        $id = Auth::User()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('Ymdhi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_img'), $filename);
            $data->photo = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Succesfully',
            'alert-type' => 'Success'
        );

        return redirect()->back()->with($notification);

    }// end methode



    public function AdminChangePassword(){

        $id = Auth::User()->id;
        $profileData = User::find($id);
        return view('admin.admin_changepassword',compact('profileData'));

    }// end methode


    public function AdminUpdatePassword(Request $request){

        //validation
        $request->validate([
            'Old_Password' => 'required',
            'New_Password' => 'required|confirmed'
        ]);

        //Match the old password
        if (!Hash::check($request->Old_Password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password not match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        //update the new password

        User::whereId(auth()->user()->id)->update([
            'password'=> Hash::make($request->New_Password)
        ]);
        $notification = array(
            'message' => 'Password change',
            'alert-type' => 'Success'
        );
        return back()->with($notification);
        

    }// end methode




    public function indexL()
    {
        
        $athletes = Athletes::where('validation','=','accept')->get();

        return view('admin.indexL', compact('athletes'));
      
    }
    public function indexDemA()
    {
        
        $athletes = Athletes::where('validation','=','en attente')->get();

        return view('admin.indexDemA', compact('athletes'));
      
    }



                    public function athcompsDemd()
                    {

                        $athcomps = Athcomps::all();
                        $epreuves = Epreuves::all();
                        $athletes = Athletes::all();
                        $competitions = competitions::all();

                        return view('admin.athcompsDemd', compact('competitions','epreuves','athletes','athcomps'));
                    
                    }
                        public function Accept_athletes($id)
                    {
                        $athletes = Athletes::find($id);
                        $athletes->validation = 'accept';
                        $athletes->save();

                        return redirect()->back()->with('success', 'User accepted successfully');
                    }
                        public function Reject_athletes($id)
                    {
                        $athletes = Athletes::find($id);
                        $athletes->validation = 'refuse';
                        $athletes->save();

                        return redirect()->back()->with('success', 'User accepted successfully');
                    }
                    public function Accept_athcomps($id)
                    {
                        $athcomps = Athcomps::find($id);
                        $athcomps->validation = 'accept';
                        $athcomps->save();

                        return redirect()->back()->with('success', 'User accepted successfully');
                    }
                        public function Reject_athcomps($id)
                    {
                        $athcomps = Athcomps::find($id);
                        $athcomps->validation = 'refuse';
                        $athcomps->save();

                        return redirect()->back()->with('success', 'User accepted successfully');
                    }



                    public function athcompsAthl()
                    {
                        
                        // $user = auth()->user();
                        // $athletes = Athletes::whereHas('users', function($query) use ($user) {
                        //     $query->where('users.id', $user->id);
                        // })->get();

                        $athcomps = Athcomps::all();
                        $epreuves = Epreuves::all();
                        $athletes = Athletes::all();
                        $competitions = competitions::all();

                        return view('admin.athcompsAthl', compact('competitions','epreuves','athletes','athcomps'));
                    
                    }
}
