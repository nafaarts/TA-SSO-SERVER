<?php

namespace Database\Seeders;

use App\Models\RoleUser;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(20)->create();
        // $faker = Faker
        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 20; $i++) {
            $user = User::create([
                'nomor_induk' => '201930' . rand(1000, 2000),
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'is_admin' => 0,
                'is_active' => Arr::random([1, 0])
            ]);

            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => Arr::random([1, 2, 3])
            ]);
        }
    }
}
