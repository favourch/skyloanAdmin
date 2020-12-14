<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(){
        return view('Admin.Pages.login');
    }

    public function userLogin(Request $request){
        $this->validate($request, [
            'email' => 'bail|required',
            'password' => 'bail|required'
        ]);
        //if (Auth::attempt(['email' => $request->email, 'password'=> $request->password])){
        if (Auth::attempt(['email' => $request->email, 'password'=> $request->password])){
        
            if (Auth::user()->role_id == 1){
                return redirect(route('admin.dashboard'));
            }
            else{
                return redirect()->back()->with('failure', 'Unauthorized Access');
            }
        }
        else{
            return redirect()->back()->with('failure','Invalid User Details');
        }
    }
}
