<?php

namespace App;

use Verta;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        /*if (is_string($role)) {

            return $this->roles()->contains('name', $role);
        }*/

        return !! $role->intersect($this->roles)->count();
    }

    // //Accessor
    // public function getNameAtrribute($name)
    // {
    //     return strtoupper($name);
    // }
                                                    //problem at login
    // //Accessor for multiple columns
    // public function __get($name)
    // {
    //     return strtoupper($this->attributes['name']);
    // }

    // //Mutator
    // public function setCreatedAtAttribute()
    // {
    //     $this->attributes['created_at'] = Verta::now();
    // }

    //Mutator for multiple columns
    public function __set($name, $value)
    {
        $this->attributes['created_at'] = Verta::now();
        $this->attributes['updated_at'] = Verta::now();
    }
}
