<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'super@mail.com',
                'role' => UserRole::SUPERADMIN,
            ],
        ];

        foreach ($users as $userData) {
            $role = Role::firstOrCreate(['name' => $userData['role']]);

            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);

            $user->assignRole($role);
        }
    }
}
