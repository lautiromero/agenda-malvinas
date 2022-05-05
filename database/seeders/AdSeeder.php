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
        $ads = array();

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'nota-home',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'nota-home',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'nota-home',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'nota-home',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'nota-home',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'nota-home',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'vertical',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Home',
            'type' => 'vertical',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Notas',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Notas',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Notas',
            'type' => 'horizontal',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Notas',
            'type' => 'vertical',
            'link' => 'https://www.ejemplo.com.ar'
        ]);

        $ads[] = Ad::create([
            'name' => 'En Notas',
            'type' => 'vertical',
            'link' => 'https://www.ejemplo.com.ar'
        ]);


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

                case 'nota-home':
                    Image::factory(1)->typeHome()->create([
                        'imageable_id' => $ad->id,
                        'imageable_type' => Ad::class
                    ]);
                    break;
            }
        }

    }
}
