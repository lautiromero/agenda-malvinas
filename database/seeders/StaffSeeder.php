<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'name' => 'Daniel Guzmán',
            'rol' => 'director'
        ]);

        Staff::create([
            'name' => 'Mario Volpe',
            'rol' => 'editor'
        ]);

        Staff::create([
            'name' => 'Jerónimo Guerrero Iraola',
            'rol' => 'editor'
        ]);

        Staff::create([
            'name' => 'Jorge Gómez',
            'rol' => 'editor'
        ]);

        Staff::create([
            'name' => 'Correa Marco Federico',
            'rol' => 'desarrollo'
        ]);
        Staff::create([
            'name' => 'Lucia Gala García Valls',
            'rol' => 'relaciones'
        ]);

        Staff::create([
            'name' => 'Marco Cavignac',
            'rol' =>   'redes'
        ]);
    }
}
