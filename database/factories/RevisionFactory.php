<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Revision>
 */
class RevisionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => VehicleFactory::new(),
            'date' => $this->faker->date(),
            'description' => $this->faker->text(),
            'cost' => $this->faker->randomFloat(2, 0, 1000),
        ];
    }


}
