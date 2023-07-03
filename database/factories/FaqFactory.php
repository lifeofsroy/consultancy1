<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question' => $this->faker->unique()->realText(50),
            'answer' => $this->faker->unique()->realText(250),
            'service_id' => $this->faker->randomElement(Service::pluck('id')),
            'status' => 1,
            'featured' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
