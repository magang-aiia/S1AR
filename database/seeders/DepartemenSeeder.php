<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departemen::create([
            'nama' => "Asset Management",
            'kode' => "ASM"
        ]);
        Departemen::create([
            'nama' => "Engineering",
            'kode' => "ENG"
        ]);
        Departemen::create([
            'nama' => "Information Technology",
            'kode' => "ITD"
        ]);
        Departemen::create([
            'nama' => "Operations",
            'kode' => "OPR"
        ]);
        Departemen::create([
            'nama' => "Productions",
            'kode' => "PRO"
        ]);
        Departemen::create([
            'nama' => "Finance Accounting",
            'kode' => "FAD"
        ]);
        Departemen::create([
            'nama' => "Human Resource Development",
            'kode' => "HRD"
        ]);
    }
}
