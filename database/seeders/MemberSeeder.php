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
        // occupant
        $member = Role::create(['name' => env('APP_DEFAULT_ROLE')]);
        $member->givePermissionTo('manage_profile');
        $member->givePermissionTo('update_profile');
    }
}
