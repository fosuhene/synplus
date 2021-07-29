<?php

namespace Database\Factories;

use App\Models\Munit;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Munit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //fake records
            'qty' => $this->faker->numberBetween(0, 100),
            'umeasure' => $this->faker->word,
        ];
    }
}
