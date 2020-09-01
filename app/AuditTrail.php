<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $fillable = [
        'action', 'user_id'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

}
