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
            Permission::create(['name' => 'manage_settings:change_app_version']);
            Permission::create(['name' => 'manage_settings:change_app_title']);
            Permission::create(['name' => 'manage_settings']);

            // --------------------------------------------
            // dashboard
            Permission::create(['name' => 'view_dashboard_message']);

            // --------------------------------------------
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
            Permission::create(['name' => 'delete_profile']);
            Permission::create(['name' => 'update_password']);
            Permission::create(['name' => 'update_email']);
            Permission::create(['name' => 'update_image']);
            Permission::create(['name' => 'update_name']);

            // --------------------------------------------
            // ui
            Permission::create(['name' => 'toggle_dark_mode']);

            // --------------------------------------------
            // dev
            Permission::create(['name' => 'dev_access']);

            // admin wildcard
            Permission::create(['name' => '*']);
        }
    }
}
