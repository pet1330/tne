<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['first_name', 'last_name', 'university_email', 'is_admin'];

    protected $hidden = [];

    protected $casts = ['is_admin'];

    public function scopeIsAdmin($q)
    {
        $q->where('is_admin', true);
    }

    public function getNameAttribute()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    // overload the defualt password and remember me token
    public function getAuthPassword()
    { /* not supported*/
    }

    public function getRememberToken()
    { /* not supported*/
    }

    public function setRememberToken($value)
    { /* not supported*/
    }

    public function getRememberTokenName()
    { /* not supported*/
    }
}
