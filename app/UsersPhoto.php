<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPhoto extends Model
{

	protected $table = 'user_photos';

   	public function user() {
        return $this->belongsTo('App\User');
    }
}
