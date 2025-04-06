<?php

namespace Database\Seeders {

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;

    class PermissionSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // --------------------------------------------
            // settings

            Permission::create(['name' => 'manage_settings']);
            // users
            Permission::create(['name' => 'manage_users']);
            Permission::create(['name' => 'manage_user']);
            Permission::create(['name' => 'create_user']);
            Permission::create(['name' => 'update_user']);
            Permission::create(['name' => 'delete_user']);

            // --------------------------------------------
            // roles
            Permission::create(['name' => 'manage_roles']);
            Permission::create(['name' => 'manage_role']);
            Permission::create(['name' => 'create_role']);
            Permission::create(['name' => 'update_role']);
            Permission::create(['name' => 'delete_role']);

            // --------------------------------------------
            // permissions
            Permission::create(['name' => 'manage_permissions']);
            Permission::create(['name' => 'manage_permission']);
            Permission::create(['name' => 'create_permission']);
            Permission::create(['name' => 'update_permission']);
            Permission::create(['name' => 'delete_permission']);

            // --------------------------------------------
            // profile
            Permission::create(['name' => 'manage_profile']);
            Permission::create(['name' => 'update_profile']);
            Permission::create(['name' => 'delete_profile']);

            // admin wildcard
            Permission::create(['name' => '*']);
        }
    }
}
