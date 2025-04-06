<?php

namespace Database\Seeders {

    use Illuminate\Support\Facades\Hash;
    use Illuminate\Database\Seeder;
    use App\Models\User;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(): void
        {
            // users
            for ($i = 0; $i < 150; $i++) {
                $user = User::create([
                    'name'     => fake()->name(),
                    'email'    => fake()->email(),
                    'password' => Hash::make('password'),
                    'phone'    => fake()->phoneNumber(),
                ]);
                $user->assignRole(env('APP_DEFAULT_ROLE'));
            }
        }
    }
}
