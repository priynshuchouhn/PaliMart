<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
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
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login'); 
    }
}
