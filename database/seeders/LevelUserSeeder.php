<?php

namespace Database\Seeders;

use App\Models\LevelUser;
use Illuminate\Database\Seeder;

class LevelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [
            'Operator/Leader',
            'Supervisor',
            'Manager',
            'Group Manager',
            'Director',
            'Vice President Dir',
            'President Director',
            'Admin',
        ];

        foreach ($level as $value) {
            LevelUser::create([
                'nama' => $value,
            ]);
        }
    }
}
