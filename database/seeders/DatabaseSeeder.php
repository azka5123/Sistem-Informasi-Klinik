<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * List of applications to add.
     */
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Define permissions
        $permissionsAdmin = ['role-list', 'role-create', 'role-edit', 'role-delete', 'user-list', 'user-create', 'user-edit', 'user-delete'];

        $permissionsApoteker = ['obat-list', 'obat-create', 'obat-edit', 'obat-delete', 'tindakan-list', 'tindakan-create', 'tindakan-edit', 'tindakan-delete', 'transaction-list', 'transaction-create', 'transaction-edit', 'transaction-delete'];

        // Create all permissions
        foreach (array_merge($permissionsAdmin, $permissionsApoteker) as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create admin role and assign permissions
        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->syncPermissions(Permission::all());

        // Create admin user and assign the role
        $adminUser = User::create([
            'name' => 'Azka',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
        ]);
        $adminUser->assignRole($adminRole);

        // Create apoteker role and assign permissions
        $apotekerRole = Role::create(['name' => 'Apoteker']);
        $apotekerRole->syncPermissions($permissionsApoteker);

        // Create apoteker user and assign the role
        $apotekerUser = User::create([
            'name' => 'Apoteker',
            'email' => 'apoteker@example.com',
            'password' => Hash::make('123'),
        ]);
        $apotekerUser->assignRole($apotekerRole);

        // Create pasien role
        $pasienRole = Role::create(['name' => 'Pasien']);

        // Create apoteker user and assign the role
        $apotekerUser = User::create([
            'name' => 'Pasien',
            'email' => 'pasien@example.com',
            'password' => Hash::make('123'),
        ]);
        $apotekerUser->assignRole($pasienRole);


        // Seed other necessary data
        $this->call([MedicineSeeder::class, TindakanSeeder::class]);
    }
}
