<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nama = [
            'Operator/Leader',
            'Supervisor',
            'Manager',
            'Group Manager',
            'Director',
            'Vice President Dir',
            'President Director',
            'Admin',
        ];

        $kode = [
            'OP',
            'SP',
            'MG',
            'GM',
            'DR',
            'VP',
            'PD',
            'ADM',
        ];

        foreach ($nama as $i=>$value) {
            Jabatan::create([
                'nama' => $value,
                'kode' => $kode[$i],
            ]);
        }
    }
}
