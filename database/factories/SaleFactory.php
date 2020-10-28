<?php

namespace Database\Factories;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\Str;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'code' => Str::random(10),
            'sale_type_id' => rand(1,2),
            'sale_date' => Carbon::now(),
            'sent_date' => Carbon::now()->addDay(),
            'description' => $this->faker->paragraph,
            'paid_amount' => null,
            'completed' => false,
            'confirmed_by_admin' => false,
        ];
    }

    public function setSaleDate($date)
    {
        return $this->state(function (array $attributes) use ($date){
            return [
                'sale_date' => Carbon::createFromFormat('Y-m-d', $date)->toDateString(),
            ];
        });
    }
}
