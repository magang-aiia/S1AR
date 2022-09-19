<?php

namespace App\Exports;

use App\Models\Absensi;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AbsensiExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    private $index = 1;
    private $tglfrom;
    private $tglto;

    public function __construct($tglfrom = null, $tglto = null)
    {
        if ($tglfrom != null) $this->tglfrom = $tglfrom;
        else $this->tglfrom = Date::now()->format('Y-m-d');
        if ($tglto != null) $this->tglto = $tglto;
        else $this->tglto = Date::now()->format('Y-m-d');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Absensi::with('user', 'shift')->whereBetween('tanggal', [$this->tglfrom, $this->tglto])->get();
    }
    
    public function map($absensi): array
    {
        return [
            $this->index++,
            $absensi->user->npk,
            $absensi->user->name,
            $absensi->shift->nama,
            $absensi->tanggal,
            $absensi->jam_masuk,
            $absensi->jam_pulang,
            $absensi->status,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'NPK',
            'Nama',
            'Shift',
            'Tanggal',
            'Jam Masuk',
            'Jam Pulang',
            'Status',
        ];
    }
}
