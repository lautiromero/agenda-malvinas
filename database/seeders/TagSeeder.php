<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'importante',
            'slug' => 'importante'
        ]);

        Tag::create([
            'name' => 'opinión',
            'slug' => 'opinion'
        ]);
        
        Tag::create([
            'name' => 'video',
            'slug' => 'video'
        ]);

        Tag::create([
            'name' => 'destacadas',
            'slug' => 'destacadas'
        ]);
    }
}
