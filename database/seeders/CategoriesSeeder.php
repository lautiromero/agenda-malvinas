<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Sin categoría',
            'slug' => 'sin-categoria'
        ]);

        Category::create([
            'name' => 'Internacionales',
            'slug' => 'internacionales'
        ]);

        Category::create([
            'name' => 'Nacionales',
            'slug' => 'nacionales'
        ]);

        Category::create([
            'name' => 'Tierra del fuego',
            'slug' => 'tierra-del-fuego'
        ]);

        Category::create([
            'name' => 'Malvinas',
            'slug' => 'malvinas'
        ]);
        Category::create([
            'name' => 'Antártida',
            'slug' => 'antartida'
        ]);

        Category::create([
            'name' => 'Atlántico Sur',
            'slug' => 'atlantico-sur'
        ]);

        Category::create([
            'name' => 'Polo Logístico Antártico',
            'slug' => 'polo-logistico-antartico'
        ]);

        Category::create([
            'name' => 'Editoriales',
            'slug' => 'editoriales'
        ]);

        Category::create([
            'name' => 'Columnistas',
            'slug' => 'columnistas'
        ]);
    }
}
