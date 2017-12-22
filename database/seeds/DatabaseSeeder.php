<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountrySeeder::class);
        $this->call(ProgrammeSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(CriteriaSeeder::class);
    }
}
