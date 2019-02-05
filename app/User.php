<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UsersDetail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function details() {
        return $this->hasOne('App\UsersDetail');
    }

    public function photos() {
        return $this->hasMany('App\UsersPhoto');
    }

    public static function datingProfileExists($user_id) {
        $datingCount = UsersDetail::select('user_id', 'approved')->where(['user_id'=>$user_id, 'approved'=>'1'])->count();
        return $datingCount;
    }

    public static function datingProfileDetails($user_id) {
        $datingProfile = UsersDetail::where('user_id',$user_id)->first();
        return $datingProfile;
    }
}
