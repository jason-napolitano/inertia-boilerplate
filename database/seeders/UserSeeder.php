<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name'     => fake()->name(),
                'email'    => fake()->email(),
                'password' => Hash::make('password'),
            ]);
            $user->assignRole(env('APP_DEFAULT_ROLE'));
        }
    }
}
