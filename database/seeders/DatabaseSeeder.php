<?php

namespace Database\Seeders;

use App\Models\Absensi;
use App\Models\Mading;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LevelUserSeeder::class,
            JabatanSeeder::class,
            DepartemenSeeder::class,
            KontrakSeeder::class,
            ShiftSeeder::class,
            UserSeeder::class,
            // AbsensiSeeder::class,
        ]);
    }
}
