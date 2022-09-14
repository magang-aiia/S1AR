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
        $default_user_value= [
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10)

];

        // create admin user
       
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin.hr@aiia.co.id',
            // 'role' => 'hr',
            'npk' => '000000',
            'avatar' => 'avatar.jpg',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $users = User::create(array_merge([
            'name' => 'Produksi',
            // 'role' => 'user',
            'avatar' => 'avatar.jpg',
            'npk' => '000002',
            'email' => 'user@aiia.co.id'
        ], $default_user_value));

        $hrd = User::create(array_merge([
            'name' => 'hrd',
            // 'role' => 'hr',
            'avatar' => 'avatar.jpg',
            'npk' => '000001',
            'email' => 'hrd@aiia.co.id'
        ], $default_user_value));

        $atasan = User::create(array_merge([
            'name' => 'Leader',
            // 'role' => 'atasan1',
            'avatar' => 'avatar.jpg',
            'npk' => '000003',
            'email' => 'atasan1@aiia.co.id'
        ], $default_user_value));

        $admin->assignRole('hrd');
        $users->assignRole('leader');
        $hrd->assignRole('hrd');
        $atasan->assignRole('supervisor');
        // random user dev
        User::factory(100)->create();
        UserDetail::factory(100)->create();
    }
}
