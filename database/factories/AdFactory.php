<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $name = $this->faker->unique()->word(20);

        return [
            'name' => $name,
            'link' => 'https://'.$this->faker->word(20).'.com',
            'type' => $this->faker->word(7)
        ];
    }
}
