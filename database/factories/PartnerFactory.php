<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $thumbName = 'partner/' . 'image' . $this->faker->numberBetween(1, 6) . '.png';

        return [
            'name' => $this->faker->name(),
            'image' => $thumbName,
            'status' => 1,
            'created_at' => $this->faker->dateTime,
            'updated_at' => Carbon::now(),
        ];
    }
}
