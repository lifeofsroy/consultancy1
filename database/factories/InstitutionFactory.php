<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Institution>
 */
class InstitutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->realText(30);
        $slug = Str::slug($title, "-");
        $thumbName = 'institution/thumb/' . 'thumb' . $this->faker->numberBetween(1, 9) . '.jpg';

        return [
            'name' => $title,
            'slug' => $slug,
            'thumb' => $thumbName,
            'image' => 'institution/image/image.jpg',
            'short' => 'N/A',
            'location' => $this->faker->word(4),
            'type' => $this->faker->word(2),
            'contact' => $this->faker->unique()->safeEmail(),
            'website' => 'https://google.com',
            'doc' => 'institution/doc/sample.pdf',
            'desc' => $this->faker->paragraph(8),
            'status' => 1,
            'featured' => 1,
            'created_at' => $this->faker->dateTime,
            'updated_at' => Carbon::now(),
        ];
    }
}
