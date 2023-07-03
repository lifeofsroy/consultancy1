<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageName = 'slider/' . 'image'. $this->faker->numberBetween(1,3). '.jpg';

        return [
            'title' => $this->faker->realText(30),
            'subtitle' => $this->faker->realText(40),
            'desc' => $this->faker->realText(300),
            'image' => $imageName,
            'url' => 'https://filamentphp.com',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
