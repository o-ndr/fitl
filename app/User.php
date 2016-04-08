<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * Get the user's first name
    *
    * @return string
    */
    // access using $this->first_name
    public function getFirstNameAttribute()
    {
        $name = $this->name;
        $name_parts = explode(' ', $name);
        $first_name = $name_parts[0];
        return $first_name;
    }
}
