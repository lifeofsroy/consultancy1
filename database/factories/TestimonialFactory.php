<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageName = 'testimonial/' . 'image'. $this->faker->numberBetween(1,3). '.jpg';

        return [
            'name' => $this->faker->name(),
            'image' => $imageName,
            'designation' => $this->faker->realText(10),
            'rating' => $this->faker->numberBetween(1,5),
            'status' => 1,
            'desc' => $this->faker->realText(100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
