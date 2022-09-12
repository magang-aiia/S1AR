<?php

namespace App\Imports;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToCollection, WithHeadingRow
{
    private $replace = false;

    public function __construct($replace = false)
    {
        $this->replace = $replace;
    }
    
    public function collection(Collection $rows)
    {
        if ($this->replace) {
            UserDetail::where('id', '<>', '1')->delete();
            User::where('id', '<>', '1')->delete();
        }
        foreach ($rows as $row) 
        {
            $user = User::create([
                'name' => $row['nama'],
                'email' => $row['email'],
                'npk' => $row['npk'],
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);
            
            UserDetail::create([
                'user_id' => $user->id,
                'departemen_id' => $row['id_departemen'],
                'kontrak_id' => $row['id_kontrak'],
                'tgl_bergabung' => $row['tanggal_bergabung'],
                'no_hp' => $row['no_hp'],
                'tmp_lahir' => $row['tempat_lahir'],
                'tgl_lahir' => $row['tanggal_lahir'],
                'jabatan' => $row['jabatan'],
                'gol' => $row['golongan'],
                'sta_kerja' => $row['status_kerja'],
                'sta_nikah' => $row['status_nikah'],
                'sta_pajak' => $row['status_pajak'],
                'no_bpjs_tk' => $row['no_bpjs_tk'],
                'no_bpjs_kes' => $row['no_bpjs_kesehatan'],
                'no_dpa' => $row['no_dpa'],
                'no_npwp' => $row['no_npwp'],
                'no_ktp' => $row['no_ktp'],
                'alamat_dom' => $row['alamat_domisili'],
                'alamat_ktp' => $row['alamat_ktp'],
                'nama_istri' => $row['nama_istri'],
                'jml_anak' => $row['jumlah_anak'],
                'nama_anak1' => $row['nama_anak_1'],
                'nama_anak2' => $row['nama_anak_2'],
                'nama_anak3' => $row['nama_anak_3'],
                'status' => $row['status'],
            ]);
        }
    }
}
