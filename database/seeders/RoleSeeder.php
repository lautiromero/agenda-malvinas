<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Periodista']);

        Permission::create(['name' => 'admin.home'])->syncPermissions($role1, $role2);
        
        Permission::create(['name' => 'admin.categorie.index'])->syncPermissions($role1, $role2);
        Permission::create(['name' => 'admin.categorie.create'])->assignRole($role1); //admin
        Permission::create(['name' => 'admin.categorie.edit'])->assignRole($role1);    //admin
        Permission::create(['name' => 'admin.categorie.destroy'])->assignRole($role1); //admin

        Permission::create(['name' => 'admin.tags.index'])->syncPermissions($role1, $role2);
        Permission::create(['name' => 'admin.tags.create'])->syncPermissions($role1, $role2);
        Permission::create(['name' => 'admin.tags.edit'])->assignRole($role1); //admin
        Permission::create(['name' => 'admin.tags.destroy'])->assignRole($role1); //admin
        
        Permission::create(['name' => 'admin.posts.index'])->syncPermissions($role1, $role2);
        Permission::create(['name' => 'admin.posts.create'])->syncPermissions($role1, $role2);
        Permission::create(['name' => 'admin.posts.edit'])->syncPermissions($role1, $role2);   
        Permission::create(['name' => 'admin.posts.destroy'])->syncPermissions($role1, $role2);
    }
}
