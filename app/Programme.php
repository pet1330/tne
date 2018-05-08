<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($programme) {
            $programme->modules()->detach();
            Module::doesntHave('programmes')->get()->each->delete();
        });
    }

    protected $table = 'programmes';

    protected $with = ['modules'];

    protected $withCount = ['modules'];

    protected $fillable = ['name'];

    protected $hidden = ['pivot', 'deleted_at', 'created_at', 'updated_at', 'country_id'];

    public function modules()
    {
        return $this->belongsToMany(Module::class);
    }

    public function country()
    {
        return $this->BelongsTo(Country::class);
    }

    public function countryIds()
    {
        return $this->country;
    }
}
