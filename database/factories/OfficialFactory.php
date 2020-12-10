<?php

namespace Database\Factories;

use App\Models\Official;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Official::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position_id' => \App\Models\Position::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
