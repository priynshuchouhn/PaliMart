<?php

namespace App\Http\Controllers\Admin;

// use hash;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    // Admin Login Function
    public function login(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'email' => 'required | email',
                'password' => 'required'
            ];
            $customMessage =[
                'email.required' => 'Email is Required',
                'email.email' => 'Enter a Valid Email Address',
                'password.required' => 'Password is Required'
            ];

            $this->validate($request,$rules,$customMessage);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>1]))
               { return redirect('admin/dashboard');}
            else{
                return redirect()->back()->with('error_message', 'Invalid Login Credantials');
             }   
        }
        return view('admin.login');
    }

    // Admin Dashboard Function 
    public function dashboard(){
        return view('admin.dashboard');
    }


    //  Admin Logout Function
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login'); 
    }

    // Admin Update Password Function 
    public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
                if($data['new_password']==$data['confirm_password']){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','Password Updated Successfully!');
                }else{
                    return redirect()->back()->with('error_message','New Password and Confirm Password Does Not Match!');
                }
                
            }else{
                return redirect()->back()->with('error_message','Current Password Does Not Match!');
            }
            
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
        
    }
    // Admin Update Details Function 
    public function updateDetails(){

    return view('admin.settings.update_admin_details');
        
    }
    // Check Admin Password Function 
    public function CheckAdminPassword(Request $request){
        $data = $request->all();

        if(Hash::check($data['current_password'], Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }

    }

}
