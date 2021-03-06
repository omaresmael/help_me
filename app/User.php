<?php

namespace App;

use App\Models\Ability;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = strlen($password)>50?bcrypt($password):$password;
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }

}
