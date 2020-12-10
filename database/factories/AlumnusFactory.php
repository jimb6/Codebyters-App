<?php

namespace Database\Factories;

use App\Models\Alumnus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumnus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
