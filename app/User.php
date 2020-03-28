<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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


//    public function setPasswordAttribute($pass){
//
//        $this->attributes['password'] = Hash::make($pass);
//
//    }

    public function teacher()
    {
        return $this->belongsTo('App\Teacher','teacher_id');
    }



    public function isTeacher()
    {
        if($this->role_id == 2)
        {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if($this->role_id == 1)
        {
            return true;
        }
        return false;
    }
}
