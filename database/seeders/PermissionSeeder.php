<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'add password']);
        Permission::create(['name' => 'update password']);
        Permission::create(['name' => 'delete password']);

        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        Permission::create(['name' => 'add category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'delete category']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('add password');
        $role1->givePermissionTo('delete password');
        $role1->givePermissionTo('update password');
        $role1->givePermissionTo('add category');
        $role1->givePermissionTo('update category');
        
        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo('update password');

        $role3 = Role::create(['name' => 'Super-Admin']);

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role3);
    }
}
