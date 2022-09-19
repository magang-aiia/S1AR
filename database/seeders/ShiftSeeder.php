<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shift::create([
            'nama' => "Shift 1",
            'jam_masuk' => "06:00:00",
            'jam_pulang' => "14:00:00",
        ]);
        Shift::create([
            'nama' => "Shift 2",
            'jam_masuk' => "14:00:00",
            'jam_pulang' => "22:00:00",
        ]);
        Shift::create([
            'nama' => "Shift 3",
            'jam_masuk' => "22:00:00",
            'jam_pulang' => "06:00:00",
        ]);
        Shift::create([
            'nama' => "Non Shift",
            'jam_masuk' => "07:15:00",
            'jam_pulang' => "16:20:00",
        ]);
    }
}
