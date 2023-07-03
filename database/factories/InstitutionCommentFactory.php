<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Institution;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InstitutionComment>
 */
class InstitutionCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'institution_id' => $this->faker->randomElement(Institution::pluck('id')),
            'desc' => $this->faker->text(100),
            'rating' => $this->faker->numberBetween(1, 5),
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
    }
}
