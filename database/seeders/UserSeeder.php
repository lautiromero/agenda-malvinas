<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
        ]);
        User::factory(50)->create();
    }
}
