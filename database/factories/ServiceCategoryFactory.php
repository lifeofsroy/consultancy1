<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceCategory>
 */
class ServiceCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $catName = $this->faker->unique()->realText(20);
        $slug = Str::slug($catName, "-");
        $imageName = 'service/category/image/'.'bg'. $this->faker->numberBetween(1,3). '.png';

        return [
            'name' => $catName,
            'slug' => $slug,
            'image' => $imageName,
            'short' => $this->faker->text(50),
            'icon' => 'heroicon-o-user-circle',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
