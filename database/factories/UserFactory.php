<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->text(255),
            'last_name' => $this->faker->lastName,
            'gender' => array_rand(array_flip(['Male', 'Female']), 1),
            'age' => $this->faker->randomNumber(0),
            'contact_number' => $this->faker->text(255),
            'email' => $this->faker->email,
            'password' => \Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'address_id' => \App\Models\Address::factory(),
        ];
    }
}
