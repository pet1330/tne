<?php

use App\Criteria;
use App\Module;
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
        Module::all()->each(function (Module $m) {
            $l = rand(0, 7);
            for ($i = 0; $l < $l; $i++) {
                $m->criterias()->save(Criteria::make('description'));
            }
        });

        Criteria::all()->each(function (Criteria $c) {
            do {
                $l = Criteria::InRandomOrder()->first();
            } while ($c->id == $l->id);
            $c->add_link($l->id);
        });
    }
}
