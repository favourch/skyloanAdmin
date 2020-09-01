<?php

namespace App;

use Faker\Calculator\Iban;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password','status', 'role_id', 'sex', 'lg_id', 'address', 'marital_status'
        , 'dob'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $primaryKey = 'idusers';
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function lgs(){
        return $this->belongsTo(Lgs::class, 'lg_id', 'idlgs');
    }

    public function state(){
        return $this->belongsTo(State::class, 'state_id', 'idstates');
    }

    public function contactUs(){
        return $this->hasMany(contactUs::class);
    }

    public function userEmployement(){
        return $this->hasOne(UserEmploymentInfo::class);
    }

    public function nextOfKin(){
        return $this->hasOne(NextOfKin::class);
    }

    public function bankInformation(){
        return $this->hasOne(BankInformation::class);
    }

    public function loans(){
        return $this->hasMany(Loan::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function auditTrail(){
        return $this->hasMany(AuditTrail::class);
    }

    public static function getUser($request){
        return User::where('email', $request->email)->first();
    }

    public static function getUserById($id){
        return User::where('idusers', $id)->first();
    }

    public static function getAllUser(){
        return User::get();
    }

    public static function getLatestUser(){
        $user = User::orderBy('idusers', 'desc')->take(4)->get();
        return $user;
    }

    public static function userAction($id, $status){
        $update_user = User::where('idusers', $id)->update([
            'status' => $status
        ]);
    }

    public static function userRoleAction($id, $role_id){
        $update_user = User::where('idusers', $id)->update([
            'role_id' => $role_id
        ]);
    }
}
