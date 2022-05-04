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
        $ads = Ad::factory(15)->create();
        foreach ($ads as $ad) {

            switch ($ad->type) {
                case 'horizontal':
                    Image::factory(1)->typeHorizontal()->create([
                        'imageable_id' => $ad->id,
                        'imageable_type' => Ad::class
                    ]);
                    break;
                
                case 'vertical':
                    Image::factory(1)->typeVertical()->create([
                        'imageable_id' => $ad->id,
                        'imageable_type' => Ad::class
                    ]);
                    break;

                default:
                    Image::factory(1)->typeHome()->create([
                        'imageable_id' => $ad->id,
                        'imageable_type' => Ad::class
                    ]);
                    break;
            }
        }

    }
}
