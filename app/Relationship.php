<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationship';
    protected $fillable = [
        'name'
    ];
    public function nextOfKin(){
        return $this->hasOne(NextOfKin::class);
    }
    public static  function checkRelationship($name){
        $relationship = Relationship::where('name', $name)->first();
        if ($relationship){
            return true;
        }
        else{
            return false;
        }
    }
    public static function addRelationship($name){
        $relationship = Relationship::create([
            'name' => $name
        ]);
    }
}
