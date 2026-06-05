<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles if they do not exist
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create default super admin
        $superAdmin = User::updateOrCreate(
            ['email' => 'admin@piyohkopi.com'],
            [
                'name' => 'Super Admin Piyoh',
                'password' => Hash::make('piyohkopi123'),
                'email_verified_at' => now(),
            ]
        );

        $superAdmin->assignRole($superAdminRole);
    }
}
