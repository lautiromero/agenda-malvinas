<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        Storage::deleteDirectory('ads');
        Storage::makeDirectory('ads');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(CategoriesSeeder::class);
        // Tag::factory(8)->create();
        // $this->call(TagSeeder::class);
        // $this->call(PostSeeder::class);
        $this->call(AdSeeder::class);
        // $this->call(StaffSeeder::class);
    }
}
