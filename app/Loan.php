<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loan extends Model
{
    protected $fillable = [
        'user_id', 'loan_range_id', 'loan_status_id', 'loan_start_date', 'loan_duration_id', 'loan_info', 'amount', 'admin_review'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }

    public function loanRange(){
        return $this->belongsTo(LoanRange::class, 'loan_range_id', 'idloanrange');
    }


    public function loanStatus(){
        return $this->belongsTo(LoanStatus::class);
    }

    public function loanDuration(){
        return $this->belongsTo(LoanDuration::class, 'loan_duration_id', 'idloanduration');
    }

    public function overduePayment(){
        return $this->hasMany(OverduePayment::class);
    }
    public static function getPendingLoans(){
        return Loan::where('loan_status', 1)->where('is_approved',2)->get();
    }
    public static function getLoanAmount(){
        return Loan::where('is_approved',0)->get();
    }
    public static function getActiveLoans(){
        return Loan::where('loan_status', 2)->get();
    }
    public static function getOverdueLoans(){
        return Loan::where('loan_status', 3)->get();
    }
    public static function getMaturedLoans(){
        return Loan::where('loan_status', 4)->get();
    }

    public static function getLoanDetails($loan){
       // $userId = auth()->user()->idusers;
        //$loanCheck = DB::table('loans')->join('loan_range','loan_range.idloanrange','=','loans.loan_range_id')
        //    ->where('loans.user_id',$userId)->where('loans.loan_status',2)->orwhere('loans.loan_status',3)->first();
        $loanCheck = $loan;
        $loanPayment = 0;
        $data['status']=false;

        if($loanCheck){

           // $loanDuration = DB::table('loan_duration')->first();
            $loanMonthlyPercentage = DB::table('loan_rate')->where('idloanrate',1)->first();
            $loanOverduePercentage = DB::table('loan_rate')->where('idloanrate',2)->first();

            $loanObtain = $loanCheck->approvedAmount;
            $duration = $loanCheck->loanDuration->duration;
            $loanStartDate = strtotime($loanCheck->loan_start_date);
            $end = strtotime("+".$duration." days",$loanStartDate);
            $today = strtotime("now");
            $timeDifference = $today-$loanStartDate;
            $dayDifference = round($timeDifference/(60 *60 *24));
            $noOfMonth = floor($dayDifference/$duration);
            $data['noOfMonth']=$noOfMonth;
            $data['noOfDays']=$dayDifference;
            $data['status']=true;
            if($today>$end){
                if($loanCheck->loan_status==2){
                   // DB::table('loans')->where('user_id',$userId)->where('loan_status',2)->update(['loan_status'=>3]);
                    $loanCheck->loan_status = 3;
                    $loanCheck->save();
                }
                $percentage = $loanOverduePercentage->rate;
                $percentageAmount =  ($percentage/100 * $loanObtain) * $noOfMonth;
                $loanPayment = $percentageAmount + $loanObtain;
            }
            else{
                $percentage =$loanMonthlyPercentage->rate;
                $percentageAmount = $percentage/100 * $loanObtain;
                $loanPayment = $percentageAmount + $loanObtain;

            }
            $data['loanToPay']=$loanPayment;
        }
        return $data;
    }

}
