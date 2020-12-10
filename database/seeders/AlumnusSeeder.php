<?php

namespace Database\Seeders;

use App\Models\Alumnus;
use Illuminate\Database\Seeder;

class AlumnusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alumnus::factory()
            ->count(5)
            ->create();
    }
}
