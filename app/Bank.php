<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name', 'sort_code'
    ];

    public function bankInformation(){
        return $this->hasOne(BankInformation::class);
    }

    public static function checkBank($name){
        $check_status = Bank::where('name', $name)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addBank($name){
        $bank = Bank::create([
            'name' => $name,
            'sort_code' => 'nil'
        ]);
    }
}
