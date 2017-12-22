<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{

    protected static function boot() {
        parent::boot();

        static::deleting(function($criteria) {
            $criteria->remove_links();
        });
    }

    protected $table = 'criterias';

    protected $fillable = ['description', 'module_id'];

    protected $hidden = ['pivot', 'module_id', 'deleted_at', 'created_at', 'updated_at'];

    public function links()
    {
        return $this->belongsToMany(Criteria::class, 'criteria_links', 'original_id', 'linked_id');
    }

    public function add_link($link_id)
    {
        $this->links()->syncWithoutDetaching([$link_id]);
        $link = Criteria::find($link_id);
        $link->links()->syncWithoutDetaching([$this->id]);
        return $this;
    }

    public function remove_link($link_id)
    {
        $this->links()->detach($link_id);
        $link = Criteria::find($link_id);
        $link->links()->detach($this->id);
        return $this;
    }

    public function remove_links()
    {
        $links = $this->links->pluck('id');
        $this->links()->detach($links);
        Criteria::findMany($links)->each(function(Criteria $c) {
            $c->links()->detach($this->id);
        });
        return $this;
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function programmes()
    {
        return $this->hasManyThrough(Programme::class, Module::class);
    }
}
