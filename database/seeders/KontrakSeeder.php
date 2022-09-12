<?php

namespace Database\Seeders;

use App\Models\Kontrak;
use Illuminate\Database\Seeder;

class KontrakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kontrak::create([
            'nama_kontrak' => 'Magang',
            'ket_kontrak' => 'Magang masa ujicoba selama 1 bulan',
            'lama_kontrak' => 1,
        ]);
        Kontrak::create([
            'nama_kontrak' => 'Kontrak 1 - 6 Bulan',
            'ket_kontrak' => 'Kontrak pertama selama 6 bulan',
            'lama_kontrak' => 6,
        ]);

        Kontrak::create([
            'nama_kontrak' => 'Kontrak 1 - 12 Bulan',
            'ket_kontrak' => 'Kontrak pertama selama 12 bulan',
            'lama_kontrak' => 12,
        ]);

        Kontrak::create([
            'nama_kontrak' => 'Kontrak 2 - 12 Bulan',
            'ket_kontrak' => 'Kontrak kedua selama 12 bulan',
            'lama_kontrak' => 24,
        ]);

        Kontrak::create([
            'nama_kontrak' => 'Kontrak 3 - 12 Bulan',
            'ket_kontrak' => 'Kontrak ketiga selama 12 bulan',
            'lama_kontrak' => 36,
        ]);

        Kontrak::create([
            'nama_kontrak' => 'Tetap',
            'ket_kontrak' => 'Kontrak kerja tetap',
            'lama_kontrak' => 0,
        ]);
    }
}
