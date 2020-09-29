<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Unit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $units = [
        ['name' => 'Piece','symbol' => 'PCS'],
        ['name' => 'Kilo','symbol' => 'KG'],
        ['name' => 'Kardus','symbol' => 'DUS'],
        ['name' => 'Liter','symbol' => 'Ltr']
        ];
        foreach ($units as $key => $unit ) {
            return [
                'name' => $unit['name'],
                'symbol' => $unit['symbol']
            ];
        }
    }
}
