<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanDuration extends Model
{
    protected $table = 'loan_duration';
    protected $fillable = [
        'duration'
    ];

    public function loan(){
        return $this->hasMany(Loan::class);
    }

    public static function checkDuration($duration){
        $check_status = LoanDuration::where('duration', $duration)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }
    public static function addDuration($request){
        $duration = LoanDuration::create([
            'duration' => $request->duration
        ]);
    }
}
