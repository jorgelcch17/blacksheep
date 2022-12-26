<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $brand_name = $this->faker->unique()->words($nb=1, $asText=true);
        return [
            'name' => $brand_name,
            'slug' => Str::slug($brand_name, '-'),
            'status' => 1,
        ];
    }
}
