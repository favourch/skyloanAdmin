<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
      'names'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
    public function userEmployer(){
        return $this->hasOne(UserEmploymentInfo::class);
    }
    public function nextOfKin(){
        return $this->hasOne(NextOfKin::class);
    }
    public static function checkState($name){
        $check_status = State::where('names', $name)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addState($name){
        $state = State::create([
            'names' => $name
        ]);
    }
}
