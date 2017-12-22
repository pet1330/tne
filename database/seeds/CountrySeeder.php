<?php

use Illuminate\Database\Seeder;
use App\Country;


class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(['name' => 'United Kingdom']);
        Country::create(['name' => 'Malaysia']);
    }
}
