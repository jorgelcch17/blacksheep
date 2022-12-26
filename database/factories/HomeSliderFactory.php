<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeSlider>
 */
class HomeSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // guardando una palabra en top_title
            'top_title' => $this->faker->word,
            // guardando 3 palabras en title
            'title' => $this->faker->words(3, true),
            // guardando 5 palabras en description
            'sub_title' => $this->faker->words(4, true),
            // guardando una oracion en offer
            'offer' => $this->faker->sentence,
            // guandando el enlace a la rute /tienda en link
            'link' => 'http://127.0.0.1:8000/tienda',
            // guardando el estado 1 en status
            'status' => 1,
        ];
    }
}
