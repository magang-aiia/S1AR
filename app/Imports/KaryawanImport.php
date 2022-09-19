<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Kontrak;
use App\Models\UserDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class KaryawanImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    private $replace = false;

    public function __construct($replace = false)
    {
        $this->replace = $replace;
    }
    
    public function collection(Collection $items)
    {
        if ($this->replace) {
            UserDetail::where('id', '<>', '1')->delete();
            User::where('id', '<>', '1')->delete();
        }

        $index = 0;

        
        foreach ($items as $item) 
        {
            // dd($items);
            if (!isset($item['kontrak'])) dd($index, $item, $items);
            $kontrak = Kontrak::where('nama_kontrak', trim($item['kontrak']))->first();
            
            $jabatan = Jabatan::where('kode', $item['departemen'])->first();
            if (!$jabatan) dd($item);
            
            $user = User::create([
                'name' => $item['nama'],
                'email' => $item['email'],
                'npk' => $item['npk'],
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'jabatan_id' => $jabatan->id,
            ]);

            if(is_numeric($item['tanggal_bergabung'])) {
                $tanggal_bergabung = Date::excelToDateTimeObject($item['tanggal_bergabung'])->format('Y-m-d');
            } else {
                $tanggal_bergabung = $item['tanggal_bergabung'];
            }

            if(is_numeric($item['tanggal_lahir'])) {
                $tanggal_lahir = Date::excelToDateTimeObject($item['tanggal_lahir'])->format('Y-m-d');
            } else {
                $tanggal_lahir = $item['tanggal_lahir'];
            }
            
            UserDetail::create([
                'user_id' => $user->id,
                'kontrak_id' => $kontrak->id,
                'departemen_id' => '1',
                'tgl_bergabung' => $tanggal_bergabung ?? '2000-01-01',
                'no_hp' => $item['no_hp'] ?? '-',
                'tmp_lahir' => $item['tempat_lahir'] ?? '-',
                'tgl_lahir' => $tanggal_lahir ?? '2000-01-01',
                'gol' => $item['golongan'] ?? '-',
                'sta_kerja' => $item['status_kerja'] ?? '-',
                'sta_nikah' => $item['status_nikah'] ?? '-',
                'sta_pajak' => $item['status_pajak'] ?? '-',
                'no_bpjs_tk' => $item['no_bpjs_tk'] ?? '-',
                'no_bpjs_kes' => $item['no_bpjs_kesehatan'] ?? '-',
                'no_dpa' => $item['no_dpa'] ?? '-',
                'no_npwp' => $item['no_npwp'] ?? '-',
                'no_ktp' => $item['no_ktp'] ?? '-',
                'alamat_dom' => $item['alamat_domisili'] ?? '-',
                'alamat_ktp' => $item['alamat_ktp'] ?? '-',
                'nama_istri' => $item['nama_istri'] ?? '-',
                'jml_anak' => $item['jumlah_anak'] ?? '0',
                'nama_anak1' => $item['nama_anak_1'] ?? '-',
                'nama_anak2' => $item['nama_anak_2'] ?? '-',
                'nama_anak3' => $item['nama_anak_3'] ?? '-',
                'status' => $item['status'] ?? 'aktif',
            ]);

            $index++;
        }
    }
}
