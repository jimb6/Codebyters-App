<?php

namespace Database\Seeders;

use App\Models\Official;
use Illuminate\Database\Seeder;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Official::factory()
            ->count(5)
            ->create();
    }
}
