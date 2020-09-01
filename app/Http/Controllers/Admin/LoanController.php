<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loan;
use App\Passcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use DB;

class LoanController extends Controller
{
    public function __construct(){
        $this->middleware('checkAuth')->except('Logout');
    }

    public function pendingLoans(){
        $loans = Loan::getPendingLoans();
        return view('Admin.Pages.pending-loans', compact('loans'));
    }
    public function loanAmount()
    {
        $loans = Loan::getLoanAmount();
        return view('Admin.Pages.loan-amount',compact('loans'));
    }

    public function activeLoans(){
        $loans = Loan::getActiveLoans();
        $loan_parameters = [];
        foreach ($loans as $key => $loan){
            $loan_details = Loan::getLoanDetails($loan);
            $loan_parameters [$key] = $loan_details;
        }
        return view('Admin.Pages.active-loans', compact('loans', 'loan_parameters'));
    }

    public function overdueLoans(){
        $loans = Loan::getOverdueLoans();
        $loan_parameters = [];
        foreach ($loans as $key => $loan){
            $loan_details = Loan::getLoanDetails($loan);
            $loan_parameters [$key] = $loan_details;
        }
        return view('Admin.Pages.overdue-loans', compact('loans', 'loan_parameters'));
    }

    public function matureLoans(){
        $loans = Loan::getMaturedLoans();
        return view('Admin.Pages.mature-loans', compact('loans'));
    }

    public function rejectLoan(Request $request, $id){
        try {

            $loan = Loan::where('idloans', $id)->update([
                'admin_review' => $request->loan_reason,
                'loan_status' => 5
            ]);
            $loan = Loan::where('idloans', $id)->first();
            Mail::to($loan->user->email)->send(new \App\Mail\RejectLoan($loan, $loan->user->fullname, $request->loan_reason));
            return redirect()->back()->with('success', 'Loan Application successfully rejected');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function approveLoan(Request $request, $id){
        $this->validate($request, [
            'passcode' => 'bail|required',
            'approvedAmount'=>'required'
        ]);

        try {
            $passcode = Passcode::find(1);
            if (Hash::check( $request->passcode ,$passcode->password )){
                $loan = Loan::where('idloans', $id)->update([
                    'is_approved' => 1,
                    'approvedAmount'=>$request->approvedAmount
                ]);
                $loan = Loan::where('idloans', $id)->first();
                Mail::to($loan->user->email)->send(new \App\Mail\ApproveLoan($loan, $loan->user->fullname));
                return redirect()->back()->with('success', 'Loan Application with amount of '.$request->approvedAmount.' naira has been approved!');
            }
            else{
                return redirect()->back()->with('failure', 'Incorrect Passcode');
            }

        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function approvePendingLoan(Request $request, $id){
        $this->validate($request, [
            'passcode' => 'bail|required',
        ]);

        try {
            $passcode = Passcode::find(1);
            if (Hash::check( $request->passcode ,$passcode->password )){
                $loan = Loan::where('idloans', $id)->update([
                    'loan_status' => 2,
                    'loan_start_date' => date('Y-m-d'),
                ]);
                $loan = Loan::where('idloans', $id)->first();
                Mail::to($loan->user->email)->send(new \App\Mail\ApproveLoan($loan, $loan->user->fullname));
                return redirect()->back()->with('success', 'Loan Application with amount of '.$request->approvedAmount.' naira has been approved!');
            }
            else{
                return redirect()->back()->with('failure', 'Incorrect Passcode');
            }

        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function loanReminder(Request $request, $id){
        try {
            $loan = Loan::where('idloans', $id)->first();
            Mail::to($loan->user->email)->send(new \App\Mail\ReminderEmail($request->mail, $loan->user->fullname));
            return redirect()->back()->with('success', 'Email Successfully Sent');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }

    }
}
