<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public $width = 640;
    public $height = 480;
    public $location = 'posts';

    public function definition()
    {        
        return [
            'url' => $this->location . '/' . $this->faker->image('public/storage/' . $this->location, $this->width, $this->height, null, false)
        ];
    }

    // public function adImg(int $width, int $height)
    // {
    //     $this->width = $width;
    //     $this->height = $height;
    // }

    public function typeHorizontal()
    {
        // $this->width = $width;
        // $this->height = $height;
        
        return $this->state(function () {
            return [
                'url' => 'ads/' . $this->faker->image('public/storage/' . 'ads', 600, 75, null, false),
            ];
        });
    }

    public function typeVertical()
    {
        // $this->width = $width;
        // $this->height = $height;
        
        return $this->state(function () {
            return [
                'url' => 'ads/' . $this->faker->image('public/storage/' . 'ads', 200, 500, null, false),
            ];
        });
    }

    public function typeHome()
    {
        // $this->width = $width;
        // $this->height = $height;
        
        return $this->state(function () {
            return [
                'url' => 'ads/' . $this->faker->image('public/storage/' . 'ads', 350, 320, null, false),
            ];
        });
    }
}
