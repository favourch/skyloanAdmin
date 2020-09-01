<?php

namespace App\Http\Controllers\Admin;

use App\Bank;
use App\Http\Controllers\Controller;
use App\Lgs;
use App\LoanDuration;
use App\LoanRange;
use App\LoanRate;
use App\Passcode;
use App\Relationship;
use App\SalaryRange;
use App\State;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(){
        $this->middleware('checkAuth')->except('Logout');
    }

    public function addRelationship(Request $request){
        $status = Relationship::checkRelationship($request->name);
        if ($status){
            return redirect()->back()->with('failure', 'Relationship already exist');
        }
        else{
            try {
                Relationship::addRelationship($request->name);
                return redirect()->back()->with('success', 'Relationship successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }

    public function updateRelationship(Request $request, $id){
        try {
            Relationship::where('idrelationship', $id)->update([
                'name' => $request->name
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function deleteRelationship($id){
        try {
            Relationship::where('idrelationship', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function addLgs(Request $request){
        $status = Lgs::checkLgs($request->name);
        if ($status){
            return redirect()->back()->with('failure', 'Local Government already exist');
        }
        else{
            try {
                Lgs::addLgs($request->name);
                return redirect()->back()->with('success', 'Local Government successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }

    public function updateLgs(Request $request, $id){
        try {
            Lgs::where('idlgs', $id)->update([
                'lgs' => $request->name
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function deleteLgs($id){
        try {
            Lgs::where('idlgs', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function addBank(Request $request){
        $status = Bank::checkBank($request->name);
        if ($status){
            return redirect()->back()->with('failure', 'Bank already exist');
        }
        else{
            try {
                Bank::addBank($request->name);
                return redirect()->back()->with('success', 'Bank successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }
    public function updateBank(Request $request, $id){
        try {
            Bank::where('idbanks', $id)->update([
                'name' => $request->name
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function deleteBank($id){
        try {
            Bank::where('idbanks', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }

    public function addState(Request $request){
        $status = State::checkState($request->name);
        if ($status){
            return redirect()->back()->with('failure', 'State already exist');
        }
        else{
            try {
                State::addState($request->name);
                return redirect()->back()->with('success', 'State successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }
    public function updateState(Request $request, $id){
        try {
            State::where('idstates', $id)->update([
                'names' => $request->name
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function deleteState($id){
        try {
            State::where('idstates', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function addRange(Request $request){
        $status = LoanRange::checkRange($request->name);
        if ($status){
            return redirect()->back()->with('failure', 'Loan Range already exist');
        }
        else{
            try {
                LoanRange::addRange($request);
                return redirect()->back()->with('success', 'Loan Range successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }
    public function updateRange(Request $request, $id){
        try {
            LoanRange::where('idloanrange', $id)->update([
                'name' => $request->name,
                'mini_range' => $request->min_range,
                'maxi_range' => $request->max_range
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function deleteRange($id){
        try {
            LoanRange::where('idloanrange', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function addSalary(Request $request){
        $status = SalaryRange::checkRange($request->range);
        if ($status){
            return redirect()->back()->with('failure', 'Salary Range already exist');
        }
        else{
            try {
                SalaryRange::addRange($request);
                return redirect()->back()->with('success', 'Salary Range successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }
    public function updateSalary(Request $request, $id){
        try {
            SalaryRange::where('idsalaryrange', $id)->update([
                'salary_range' => $request->range
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function DeleteSalary($id){
        try {
            SalaryRange::where('idsalaryrange', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function addDuration(Request $request){
        $status = LoanDuration::checkduration($request->duration);
        if ($status){
            return redirect()->back()->with('failure', 'Loan Duration already exist');
        }
        else{
            try {
                LoanDuration::addDuration($request);
                return redirect()->back()->with('success', 'Loan Duration successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }
    public function updateDuration(Request $request, $id){
        try {
            LoanDuration::where('idloanduration', $id)->update([
                'duration' => $request->duration
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function DeleteDuration($id){
        try {
            LoanDuration::where('idloanduration', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function addRate(Request $request){
        $status = LoanRate::checkRate($request->rate);
        if ($status){
            return redirect()->back()->with('failure', 'Loan Rate already exist');
        }
        else{
            try {
                LoanRate::addRate($request);
                return redirect()->back()->with('success', 'Loan Rate successfully added');
            }
            catch (\Exception $exception){
                return  redirect()->back()->with('failure', $exception->getMessage());
            }
        }

    }
    public function updateRate(Request $request, $id){
        try {
            LoanRate::where('idloanrate', $id)->update([
                'rate' => $request->rate,
                'description' => $request->description,
            ]);
            return redirect()->back()->with('success', 'Entry Successfully Updated');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function DeleteRate($id){
        try {
            LoanRate::where('idloanrate', $id)->delete();
            return redirect()->back()->with('success', 'Entry Successfully Deleted');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
    public function updatePasscode(Request $request){
        $this->validate($request, [
           'password' => 'bail|required'
        ]);
        try {
            $passcode = Passcode::find(1);
            if ($passcode){
                $passcode->password = bcrypt($request->password);
                $passcode->save();
                return redirect()->back()->with('success', "Passcode Updated Successfully");
            }
            else{
                Passcode::create([
                    'password' => bcrypt($request->password)
                ]);
                return redirect()->back()->with('success', "Passcode Updated Successfully");
            }
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
}
