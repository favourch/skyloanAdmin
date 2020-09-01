<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'reference', 'amount'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getAllTransactions(){
        return Transaction::get();
    }
}
