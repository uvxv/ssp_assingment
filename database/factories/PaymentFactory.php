<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Payment::class;
    public function definition(): array
    {
        return [
            'user_id' => User::count() ? User::inRandomOrder()->value('id') : User::factory(),
            'stripe_payment_id' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'amount' => $this->faker->randomFloat(2, 10, 5000),
        ];
    }
}
