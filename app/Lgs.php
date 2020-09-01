<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lgs extends Model
{
    protected $fillable = [
        'lgs'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function userEmployment(){
        return $this->hasOne(UserEmploymentInfo::class);
    }

    public function nextOfKin(){
        return $this->hasOne(NextOfKin::class);
    }

    public static function checkLgs($name){
        $check_status = Lgs::where('lgs', $name)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addLgs($name){
        $Lgs = Lgs::create([
            'lgs' => $name
        ]);
    }
}
