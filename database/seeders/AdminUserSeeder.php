<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Role::firstOrCreate(['name' => 'super_admin']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'cashier']);

        $superAdmin = User::firstOrNew(['email' => 'admin@piyohkopi.com']);
        $superAdmin->name = $superAdmin->name ?: 'Super Admin Piyoh';

        if (! $superAdmin->exists) {
            $superAdmin->password = Hash::make(env('DEFAULT_ADMIN_PASSWORD', Str::random(32)));
            $superAdmin->email_verified_at = now();
        } elseif (! $superAdmin->email_verified_at) {
            $superAdmin->email_verified_at = now();
        }

        $superAdmin->save();
        $superAdmin->syncRoles(['super_admin']);
    }
}
