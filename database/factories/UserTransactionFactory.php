<?php

namespace Database\Factories;

use App\Models\UserTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'transaction_id' => $this->faker->uuid(),
            'payment_mode' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['Deposit', 'Withdraw']),
            'description' => $this->faker->paragraph(),
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'amount' => $this->faker->randomFloat(2, 10, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'deleted_at' => $this->faker->optional(0.1, now())->dateTimeBetween('-1 year', 'now'), // 10% chance of being deleted
        ];
    }
}

