<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankInformation extends Model
{
    protected $fillable = [
        'user_id', 'status', 'bank_id', 'account_number', 'bvn'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }

    public function bank(){
        return $this->belongsTo(Bank::class, 'bank_id', 'idbanks');
    }
}
