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
            'nama_kontrak' => 'Magang (1 bulan)',
            'ket_kontrak' => 'Magang masa ujicoba selama 1 bulan',
            'lama_kontrak' => 1,
        ]);
        Kontrak::create([
            'nama_kontrak' => 'Kontrak I (6 bulan)',
            'ket_kontrak' => 'Kontrak pertama selama 6 bulan',
            'lama_kontrak' => 6,
        ]);

        Kontrak::create([
            'nama_kontrak' => 'Kontrak I (1 tahun)',
            'ket_kontrak' => 'Kontrak pertama selama 12 bulan',
            'lama_kontrak' => 12,
        ]);

        Kontrak::create([
            'nama_kontrak' => 'Kontrak II (1 tahun)',
            'ket_kontrak' => 'Kontrak kedua selama 12 bulan',
            'lama_kontrak' => 24,
        ]);

        Kontrak::create([
            'nama_kontrak' => 'Tetap / Permanent',
            'ket_kontrak' => 'Kontrak kerja tetap',
            'lama_kontrak' => 0,
        ]);
    }
}
