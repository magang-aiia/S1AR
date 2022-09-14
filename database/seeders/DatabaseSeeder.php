<?php

namespace Database\Seeders;

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
            DepartemenSeeder::class,
            KontrakSeeder::class,
            UserRolePermissionSeeder::class,
            UserSeeder::class,
            
        ]);
    }
}
