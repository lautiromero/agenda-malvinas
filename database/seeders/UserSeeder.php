<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use function PHPSTORM_META\map;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lautaro Romero',
            'email' => 'lautiromero94@gmail.com',
            'password' => bcrypt('rock1994')
        ])->assignRole('Admin');

        User::create([
            'name' => 'Marco Correa',
            'email' => 'casacorrea50@gmail.com',
            'password' => bcrypt('imago2010')
        ])->assignRole('Admin');

        User::factory(10)->create();
    }
}
