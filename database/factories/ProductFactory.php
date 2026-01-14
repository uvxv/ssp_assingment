<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'admin_id' => Admin::count() ? Admin::inRandomOrder()->value('admin_id') : Admin::factory(),
            'name' => $this->faker->word(),
            'image_path' => 'https://picsum.photos/300/300',
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['available', 'not available']),
        ];
    }
}
