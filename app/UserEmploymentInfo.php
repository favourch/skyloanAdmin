<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmploymentInfo extends Model
{
    protected $fillable = [
        'user_id', 'employment_type_id', 'employer_name', 'employer_lg_id', 'employer_address', 'salary_range_id', 'nature_of_job'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function employmentType(){
        return $this->belongsTo(EmploymentType::class);
    }
    public function employerLg(){
        return $this->belongsTo(Lgs::class);
    }
    public function salaryRange(){
        return $this->belongsTo(SalaryRange::class);
    }
    public function employerState(){
        return $this->belongsTo(State::class);
    }
}
