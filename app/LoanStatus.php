<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanStatus extends Model
{
    protected $fillable = [
        'status'
    ];

    public function loan(){
        return $this->hasMany(Loan::class);
    }
}
