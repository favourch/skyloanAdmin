<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmploymentType extends Model
{
    protected $fillable = [
        'employment'
    ];

    public function userEmployment(){
        return $this->hasOne(UserEmploymentInfo::class);
    }
}
