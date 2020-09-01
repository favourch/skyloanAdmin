<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use App\Lgs;
use App\Loan;
use App\LoanDuration;
use App\LoanRange;
use App\LoanRate;
use App\NextOfKin;
use App\Relationship;
use App\SalaryRange;
use App\State;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('checkAuth')->except('Logout');
    }

    public function Dashboard(){
        $users = User::getAllUser();
        $pending_loans = Loan::getPendingLoans();
        $active_loans = Loan::getActiveLoans();
        $matured_loans = Loan::getMaturedLoans();
        $latest_users = User::getLatestUser();
        return view('Admin.Pages.dashboard', compact('users', 'active_loans','pending_loans', 'matured_loans',  'latest_users'));
    }

    public function Logout(){
        Auth::logout();
        return redirect(route('Admin.login'))->with('success', 'Successfully Logged Out');
    }

    public function approveUser($id){
        try {
            $update_user = User::userAction($id, 1);
            return redirect()->back()->with('success', 'Operation performed successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function rejectUser($id){
        try {
            $update_user = User::userAction($id, 0);
            return redirect()->back()->with('success', 'Operation performed successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function suspendUser($id){
        try {
            $update_user = User::userAction($id, 2);
            return redirect()->back()->with('success', 'Operation performed successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function makeAdmin($id){
        try {
            $update_user_role = User::userRoleAction($id, 2);
            return redirect()->back()->with('success', 'Operation performed successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function removeAdmin($id){
        try {
            $update_user_role = User::userRoleAction($id, 1);
            return redirect()->back()->with('success', 'Operation performed successfully');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function userManagement(){
        $users = User::getAllUser();
        return view('Admin.Pages.user-management', compact('users'));
    }

    public function viewUserDetails($id){
        $user = User::getUserById($id);
        $next_of_kin = NextOfKin::getUserNextOfKin($id);
        return view('Admin.Pages.user-details', compact('user', 'next_of_kin'));
    }

    public function systemSettings(){
        $loan_range = LoanRange::get();
        $salaries = SalaryRange::get();
        $loan_duration = LoanDuration::get();
        $loan_rate = LoanRate::get();
        return view('Admin.Pages.system-settings', compact(
            'loan_range', 'salaries', 'loan_duration', 'loan_rate'));
    }

    public function lgStateSettings(){
        $lgs = Lgs::get();
        $states = State::get();
        return view('Admin.Pages.lg_state_settings', compact( 'lgs',  'states'));
    }

    public function otherSettings(){
        $relationships = Relationship::get();
        $banks = Bank::get();
        return view('Admin.Pages.other_settings', compact('relationships',  'banks'));
    }

}
