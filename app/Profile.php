<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Profile extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['user_id', 'avatar', 'about', 'facebook', 'youtube'];
}
