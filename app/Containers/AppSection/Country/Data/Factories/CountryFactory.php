<?php

namespace App\Containers\AppSection\Country\Data\Factories;

use App\Containers\AppSection\Country\Models\Country;
use App\Ship\Parents\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CountryFactory extends Factory
{
    protected $model = Country::class;

    public function definition(): array
    {
        static $password;

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $password ?: $password = Hash::make('testing-password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => false,
        ];
    }

    public function admin(): CountryFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_admin' => true,
            ];
        });
    }

    public function unverified(): CountryFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
