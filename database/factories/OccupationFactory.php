<?php

namespace Database\Factories;

use App\Models\Occupation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OccupationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Occupation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];
    }
}