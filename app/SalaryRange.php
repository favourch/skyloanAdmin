<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryRange extends Model
{
    protected $table = 'salary_range';
    protected $fillable = [
        'salary_range'
    ];
    public function userEmployment(){
        return $this->hasMany(UserEmploymentInfo::class);
    }
    public static function checkRange($range){
        $check_status = SalaryRange::where('salary_range', $range)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addRange($request){
        $range = SalaryRange::create([
            'salary_range' => $request->range
        ]);
    }
}
