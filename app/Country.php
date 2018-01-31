<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected static function boot() {
        parent::boot();

        static::deleting(function($country) {
             $country->programmes->each->delete();
        });
    }

    protected $table ='countries';

    protected $with = [ 'programmes' ];

    protected $withCount = ['programmes'];

    protected $fillable = [ 'name' ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function programmes()
    {
        return $this->hasMany(Programme::class);
    }
}
