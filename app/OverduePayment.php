<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OverduePayment extends Model
{
    protected $fillable  = [
        'loan_id', 'amount'
    ];
    public function loan(){
        return $this->belongsTo(Loan::class);
    }
}
