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
            'order_id' => Order::count() ? Order::inRandomOrder()->value('order_id') : Order::factory(),
            'user_id' => User::count() ? User::inRandomOrder()->value('id') : User::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 5000),
        ];
    }
}
