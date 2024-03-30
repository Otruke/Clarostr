<?php

namespace Database\Factories;

use App\Models\Earning;
use Illuminate\Database\Eloquent\Factories\Factory;

class EarningsFactory extends Factory
{
    protected $model = Earnings::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 100),
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
