<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanRate extends Model
{
    protected $table = 'loan_rate';
    protected $fillable = [
        'rate', 'description'
    ];
    public static function checkRate($rate){
        $check_status = LoanRate::where('rate', $rate)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addRate($request){
        $rate = LoanRate::create([
            'rate' => $request->rate,
            'description' => $request->description,
        ]);
    }
}
