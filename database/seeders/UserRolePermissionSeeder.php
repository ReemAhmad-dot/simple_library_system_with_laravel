<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'view book']);
        Permission::create(['name' => 'create book']);
        Permission::create(['name' => 'update book']);
        Permission::create(['name' => 'delete book']);
        
        Permission::create(['name' => 'add book to favorite']);
        Permission::create(['name' => 'rate book']);

        // Create Roles
        $adminRole = Role::create(['name' => 'admin']);
        $memberRole = Role::create(['name' => 'member']);

        // Lets give all permission to admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();
        $adminRole->givePermissionTo($allPermissionNames);

        $memberRole->givePermissionTo(['add book to favorite','rate book']);
        
        $adminUser = User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make ('12345678'),
        ]);

        $adminUser->assignRole($adminRole);
    }
}
