<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Module $module) {
            $module->programmes()->detach();
            $module->criterias->each->delete();
        });
    }

    protected $table = 'modules';

    protected $withCount = ['criterias'];

    protected $fillable = ['name'];

    protected $hidden = ['pivot', 'deleted_at', 'created_at', 'updated_at'];

    public function programmes()
    {
        return $this->BelongsToMany(Programme::class);
    }

    public function countries()
    {
        return $this->hasManyThrough(Programme::class, Country::class);
    }

    public function criterias()
    {
        return $this->hasMany(Criteria::class);
    }
}
