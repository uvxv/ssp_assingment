<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;
    public function definition(): array
    {
        return [
            'user_id' => User::count() ? User::inRandomOrder()->value('id') : User::factory(),
            'product_id' => Product::count() ? Product::inRandomOrder()->value('product_id') : Product::factory(),
            'payment_id' => Payment::count() ? Payment::inRandomOrder()->value('payment_id') : null,
            'total_amount' => $this->faker->randomFloat(2, 10, 5000),
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
