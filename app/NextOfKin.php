<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    protected $fillable = [
        'user_id', 'phone_number', 'email', 'state_id', 'lg_id', 'address', 'relationship_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'idstates');
    }

    public function lgs(){
        return $this->belongsTo(Lgs::class, 'lg_id', 'idlgs');
    }

    public function relationship(){
        return $this->belongsTo(Relationship::class, 'relationship_id', 'idrelationship');
    }

    public static function getUserNextOfKin($id){
        return NextOfKin::where('user_id', $id)->first();
    }

}
