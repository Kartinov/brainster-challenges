<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => "https://picsum.photos/id/4/400/300",
            'name' => $this->faker->company(),
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
