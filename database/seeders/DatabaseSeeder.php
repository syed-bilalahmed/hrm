<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create basic roles
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'Admin']);
        $hrRole = \Spatie\Permission\Models\Role::create(['name' => 'HR']);
        $employeeRole = \Spatie\Permission\Models\Role::create(['name' => 'Employee']);

        // Create the Super Admin user
        $admin = User::firstOrCreate([
            'email' => 'admin@hrm.app',
        ], [
            'name' => 'Super Admin',
            'password' => bcrypt('password'),
        ]);

        // Assign Admin role to the admin user
        $admin->assignRole($adminRole);
    }
}
