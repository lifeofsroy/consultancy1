<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $serviceTitle = $this->faker->unique()->realText(30);
        $slug = Str::slug($serviceTitle, "-");
        $thumbimageName = 'service/thumb/' . 'thumb' . $this->faker->numberBetween(1, 4) . '.jpg';

        return [
            'title' => $serviceTitle,
            'slug' => $slug,
            'service_category_id' => $this->faker->randomElement(ServiceCategory::pluck('id')),
            'short' => $this->faker->text(80),
            'thumb' => $thumbimageName,
            'desc' => $this->faker->realText(1000),
            'doc' => 'service/doc/sample.pdf',
            'image' => 'service/image/image.jpg',
            'status' => 1,
            'featured' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
