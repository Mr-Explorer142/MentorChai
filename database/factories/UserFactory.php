<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state (student by default).
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'              => fake()->name(),
            'email'             => fake()->unique()->safeEmail(),
            'password'          => static::$password ??= Hash::make('password'),
            'role'              => UserRole::Student,
            'status'            => UserStatus::ACTIVE,
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            'last_seen_at'      => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }

    /**
     * Student state.
     */
    public function student(): static
    {
        return $this->state(fn() => [
            'role' => UserRole::Student,
        ]);
    }

    /**
     * Mentor state.
     */
    public function mentor(): static
    {
        return $this->state(fn() => [
            'role' => UserRole::Mentor,
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
