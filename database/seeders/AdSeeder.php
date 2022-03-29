<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ad;
use App\Models\Image;
use Database\Factories\ImageFactory;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = Ad::factory(10)->create();
        foreach ($ads as $ad) {
            Image::factory(1)->create([
                'imageable_id' => $ad->id,
                'imageable_type' => Ad::class
            ]);
        }

    }
}
