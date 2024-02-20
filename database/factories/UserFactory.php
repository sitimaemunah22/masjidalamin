<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => 'admin'.rand(10, 99),
            'email' => fake()->unique()->safeEmail(),
            'role' => 'admin',
            'password' => static::$password ?? Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ];
    }
}
