<?php

use Illuminate\Database\Seeder;
use App\Programme;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Programme::create(['country_id' => 1, 'name' => 'BSc Computer Science']);
        Programme::create(['country_id' => 1, 'name' => 'Games Computing']);
        Programme::create(['country_id' => 1, 'name' => 'Mathematics and Computer Science']);
        Programme::create(['country_id' => 2, 'name' => 'Bachelor of Computer Science']);
        Programme::create(['country_id' => 2, 'name' => 'Bachelor of Computer Science in Games Programming']);
    }
}
