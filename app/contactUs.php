<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    protected $fillable = [
        'user_id', 'attended_to', 'message'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'idusers');
    }
}
