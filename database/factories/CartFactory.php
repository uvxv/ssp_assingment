<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Cart::class;
    public function definition(): array
    {
        return [
            'user_id' => User::count() ? User::inRandomOrder()->value('id') : User::factory(),
            'product_id' => Product::count() ? Product::inRandomOrder()->value('product_id') : Product::factory(),
        ];
    }
}
