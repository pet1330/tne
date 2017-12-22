<?php

use App\Module;
use App\Criteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::all()->each(function(Module $m){
            $m->criterias()->saveMany(factory(Criteria::class, rand(0,7))->make());
        });

        Criteria::all()->each(function(Criteria $c){
            do { $l = Criteria::InRandomOrder()->first(); } while ( $c->id == $l->id );
            $c->add_link($l->id);
        });
    }
}
