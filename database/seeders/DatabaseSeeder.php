<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(OfficialSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(InstituteSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AlumnusSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(OccupationSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
