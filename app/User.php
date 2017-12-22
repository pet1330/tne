<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [ 'first_name', 'last_name', 'university_email', 'is_admin' ];

    protected $hidden = [];

    protected $casts = [ 'is_admin' ];

    public function scopeIsAdmin($q)
    {
        $q->where('is_admin', true);
    }

    public function getNameAttribute()
    {
        return sprintf("%s %s", $this->first_name, $this->last_name);
    }

    // overload the defualt password and remember me token
    public function getAuthPassword() {return null; /* not supported*/ }
    public function getRememberToken() {return null; /* not supported*/ }
    public function setRememberToken($value) {return null; /* not supported*/ }
    public function getRememberTokenName() {return null; /* not supported*/ }

}
