<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    
    {
        return [
            'username' => $faker->unique()->userName,
            'first_name' => $faker->unique()->firstName(),
            'middle_name' => $faker->optional()->middleName(),
            'last_name' => $faker->optional()->lastName(),
            'email' => $faker->unique()->safeEmail(),
            'phone_number' => $faker->unique()->phoneNumber(),
            'gender' => $faker->randomElement(['male', 'female']),
            'sponsor' => $faker->optional()->userName(),
            'package' => $faker->randomElement(['basic', 'standard', 'premium']),
            'referral_link' => $this->faker->referralLink(),
            'direct_downlines_count' => $faker->directDownlinesCount(0, 4),
            'overflow_distributed'=> $this->faker->boolean(80), // 80% chance of being true
            'role' => $faker->randomElement(['User', 'Moderator', 'Admin']),
            'level' => $faker->level(),
            'amount' => $faker->numberBetween(100, 10000),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'bank_name' => $faker->company(),
            'bank_account_name' => $faker->bankAccountName(),
            'bank_account_number' => $faker->bankAccountNumber(),
            'address' => $faker->address(),
            'state' => $faker->state(),
            'country' => $faker->country(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'unsubscribed_days' => Str::random(10),
            'is_subscribed' => $this->faker->boolean(80), // 80% chance of being true (successful payment)
            'sub_status' => $this->faker->boolean(80),
            'next_billing' => now()->addMonth(),
            'earned_downliner_ids' => [],
            'monthly_earned_downliner_ids' => [],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
