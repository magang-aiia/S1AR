<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin user
       
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin.hr@aiia.co.id',
            'role' => 'hr',
            'npk' => '000000',
            'avatar' => 'avatar.jpg',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // random user dev
        User::factory(100)->create();
        UserDetail::factory(100)->create();
    }
}
