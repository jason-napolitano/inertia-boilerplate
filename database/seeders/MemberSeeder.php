<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // administrator
        $member = Role::create(['name' => env('APP_DEFAULT_ROLE')]);
        $member->givePermissionTo('view_dashboard_message');
        $member->givePermissionTo('update_password');
        $member->givePermissionTo('manage_profile');
        $member->givePermissionTo('update_email');
        $member->givePermissionTo('update_image');
        $member->givePermissionTo('update_name');
    }
}
