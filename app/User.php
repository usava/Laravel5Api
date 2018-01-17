<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function articles()
    {
        return $this->hasMany('App\Article', 'user_id');
    }

    public function generateToken(){
        do {
            $api_token = str_random(32);
        } while (User::where("api_token", "=", $api_token)->first() instanceof User);
        $this->api_token = $api_token;
        $this->update();
        return $this->api_token;
    }
}
