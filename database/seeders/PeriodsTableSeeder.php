<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\Period::factory(2)->create();
    }
}
