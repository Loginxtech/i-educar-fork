<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'state_id' => State::factory()->create(),
            'name' => $this->faker->city(),
            'ibge_code' => $this->faker->numerify('########'),
        ];
    }

    public function unique(): self
    {
        return $this->state(function () {

        });
    }
}
