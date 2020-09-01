<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanRange extends Model
{
    protected $table = 'loan_range';
    protected $fillable = [
        'name', 'mini_range', 'maxi_range'
    ];

    public function loans(){
        return $this->hasMany(Loan::class);
    }
    public static function checkRange($name){
        $check_status = LoanRange::where('name', $name)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addRange($request){
        $range = LoanRange::create([
            'name' => $request->name,
            'mini_range' => $request->min_range,
            'maxi_range' => $request->max_range
        ]);
    }

}
