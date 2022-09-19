<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Shift;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class AbsensiImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    private $replace = false;

    public function __construct($replace = false)
    {
        $this->replace = $replace;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        if($this->replace) {
            Absensi::truncate();
        }

        foreach ($collection as $row) {
            $user_id = User::where('npk', $row['npk'])->first()->id;
            $shift_id = Shift::where('nama', $row['shift'])->first()->id;

            if (is_numeric($row['tanggal'])) {
                $tanggal = Date::excelToDateTimeObject($row['tanggal'])->format('Y-m-d');
            } else {
                $tanggal = $row['tanggal'];
            }

            if(is_numeric($row['jam_masuk'])) {
                $jam_masuk = Date::excelToDateTimeObject($row['jam_masuk'])->format('H:i:s');
            } else {
                $jam_masuk = $row['jam_masuk'];
            }

            if(is_numeric($row['jam_pulang'])) {
                $jam_pulang = Date::excelToDateTimeObject($row['jam_pulang'])->format('H:i:s');
            } else {
                $jam_pulang = $row['jam_pulang'];
            }

            Absensi::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'tanggal' => $tanggal,
                ],
                [
                    'shift_id' => $shift_id,
                    'jam_masuk' => $jam_masuk,
                    'jam_pulang' => $jam_pulang,
                    'status' => $row['status'],
                ]
            );
        }
    }
}
