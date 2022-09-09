<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KaryawanExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    private $index = 1;
    
    public function collection()
    {
        return User::with(['userDetail'])->where('id', '!=', '1')->get();
    }

    public function map($data): array
    {
        return [
            [
                $this->index++,
                $data->npk ?? '',
                $data->name ?? '',
                $data->email ?? '',
                $data->userDetail->no_hp ?? '',
                $data->userDetail->tmp_lahir ?? '',
                $data->userDetail->tgl_lahir ?? '',
                $data->userDetail->tgl_bergabung ?? '',
                $data->userDetail->departemen->id ?? '',
                $data->userDetail->departemen->nama ?? '',
                $data->userDetail->kontrak->id ?? '',
                $data->userDetail->kontrak->nama_kontrak ?? '',
                $data->userDetail->gol ?? '',
                $data->userDetail->sta_kerja ?? '',
                $data->userDetail->sta_nikah ?? '',
                $data->userDetail->sta_pajak ?? '',
                $data->userDetail->no_bpjs_tk ?? '',
                $data->userDetail->no_bpjs_kes ?? '',
                $data->userDetail->no_dpa ?? '',
                $data->userDetail->no_npwp ?? '',
                $data->userDetail->no_ktp ?? '',
                $data->userDetail->alamat_dom ?? '',
                $data->userDetail->alamat_ktp ?? '',
                $data->userDetail->nama_istri ?? '',
                $data->userDetail->jml_anak ?? '',
                $data->userDetail->nama_anak1 ?? '',
                $data->userDetail->nama_anak2 ?? '',
                $data->userDetail->nama_anak3 ?? '',
                $data->userDetail->status ?? '',
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'NPK',
            'Nama',
            'Email',
            'No HP',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Tanggal Bergabung',
            'ID Departemen',
            'Departemen',
            'Kontrak',
            'ID Kontrak',
            'Golongan',
            'Status Kerja',
            'Status Nikah',
            'Status Pajak',
            'No BPJS TK',
            'No BPJS Kesehatan',
            'No DPA',
            'No NPWP',
            'No KTP',
            'Alamat Domisili',
            'Alamat KTP',
            'Nama Istri',
            'Jumlah Anak',
            'Nama Anak 1',
            'Nama Anak 2',
            'Nama Anak 3',
            'Status',
        ];
    }
}
