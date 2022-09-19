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
        User::create([
            'name' => 'Admin',
            'email' => 'admin.hr@aiia.co.id',
            'npk' => '000000',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'jabatan_id' => 1,
        ]);

        // random user dev
        // User::factory(300)->create();
        // UserDetail::factory(300)->create();
    }
}
