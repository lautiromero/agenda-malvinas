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

        Permission::create(['name' => 'admin.home'])->syncRoles($role1, $role2);
        
        //usuarios crud
        Permission::create(['name' => 'admin.users.index'])->assignRole($role1); //admin
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);    //admin
        Permission::create(['name' => 'admin.users.update'])->assignRole($role1);    //admin
        
        //categorias crud
        Permission::create(['name' => 'admin.categories.index'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.categories.create'])->assignRole($role1); //admin
        Permission::create(['name' => 'admin.categories.edit'])->assignRole($role1);    //admin
        Permission::create(['name' => 'admin.categories.destroy'])->assignRole($role1); //admin

        //tags crud
        Permission::create(['name' => 'admin.tags.index'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.tags.edit'])->assignRole($role1); //admin
        Permission::create(['name' => 'admin.tags.destroy'])->assignRole($role1); //admin
        
        //post crud
        Permission::create(['name' => 'admin.posts.index'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles($role1, $role2);   
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles($role1, $role2);
        Permission::create(['name' => 'admin.posts.upload'])->syncRoles($role1, $role2);

        //ads crud
        Permission::create(['name' => 'admin.ads.index'])->assignRole($role1); //admin
        Permission::create(['name' => 'admin.ads.create'])->assignRole($role1); //admin
        Permission::create(['name' => 'admin.ads.edit'])->assignRole($role1);    //admin
        Permission::create(['name' => 'admin.ads.destroy'])->assignRole($role1); //admin
    }
}
