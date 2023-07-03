<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->unique()->realText(50);
        $slug = Str::slug($title, "-");

        return [
            'title' => $title,
            'slug' => $slug,
            'short' => $this->faker->realText(200),
            'doc' => 'notice/doc/sample.pdf',
            'desc' => $this->faker->paragraph(50),
            'status' => 1,
            'header' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
