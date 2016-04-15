<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract

{
    use Authenticatable, CanResetPassword;

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

    public function presentations()
    {
        return $this->hasMany('App\Presentation');
    }

    public function ratings()
    {
        return $this->hasMany('App\Ratings');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'users_roles');
    }

    public function hasRole($role)
    {
        // get an array of *only* the role names 
        $roleNames = $this->roles->pluck('name')->toArray();
        return in_array($role, $roleNames);
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}
