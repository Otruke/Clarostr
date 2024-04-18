<?php

namespace Database\Factories;

use App\Models\WithdrawalHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class WithdrawalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 100),
            'transaction_id' => $this->faker->uuid(),
            'starter_earnings' => $this->faker->randomFloat(2, 0, 1000),
            'direct_referral_earnings' => $this->faker->randomFloat(2, 0, 1000),
            'downliners_earnings' => $this->faker->randomFloat(2, 0, 1000),
            'descendants_monthly_earnings' => $this->faker->randomFloat(2, 0, 1000),
            'monthly_earnings' => $this->faker->randomFloat(2, 0, 1000),
            'food_invest_earnings' => $this->faker->randomFloat(2, 0, 1000),
            'total_earnings' => $this->faker->randomFloat(2, 0, 1000),
            
        ];
    }

    public function userRelated()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => factory(\App\Models\User::class),
            ];
        });
    }
}
