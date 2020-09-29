<?php

namespace Database\Factories;

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

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => rand(1,5),
            'name' => $this->faker->sentence(3),
            'code' => $this->faker->randomDigit,
            'description' => $this->faker->sentence(6),
            'unit_id' => 1,
            'status' => true
        ];
    }
}
