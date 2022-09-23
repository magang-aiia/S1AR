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
        return User::with(['user_detail'])->where('id', '!=', '1')->get();
    }

    public function map($data): array
    {
        return [
            [
                $this->index++,
                trim($data->npk) ?? '-',
                trim($data->name) ?? '-',
                trim($data->email) ?? '-',
                trim($data->user_detail->no_hp) ?? '-',
                trim($data->user_detail->tmp_lahir) ?? '-',
                trim($data->user_detail->tgl_lahir) ?? '-',
                trim($data->user_detail->tgl_bergabung) ?? '-',
                trim($data->bagian->kode) ?? '-',
                trim($data->bagian->nama) ?? '-',
                trim($data->user_detail->kontrak->nama_kontrak) ?? '-',
                trim($data->bagian->jabatan->nama) ?? '-',
                trim($data->user_detail->gol) ?? '-',
                trim($data->user_detail->sta_kerja) ?? '-',
                trim($data->user_detail->sta_nikah) ?? '-',
                trim($data->user_detail->sta_pajak) ?? '-',
                trim($data->user_detail->no_bpjs_tk) ?? '-',
                trim($data->user_detail->no_bpjs_kes) ?? '-',
                trim($data->user_detail->no_dpa) ?? '-',
                trim($data->user_detail->no_npwp) ?? '-',
                trim($data->user_detail->no_ktp) ?? '-',
                trim($data->user_detail->alamat_dom) ?? '-',
                trim($data->user_detail->alamat_ktp) ?? '-',
                trim($data->user_detail->nama_istri) ?? '-',
                trim($data->user_detail->jml_anak) ?? '0',
                trim($data->user_detail->nama_anak1) ?? '-',
                trim($data->user_detail->nama_anak2) ?? '-',
                trim($data->user_detail->nama_anak3) ?? '-',
                trim($data->user_detail->status) ?? '-',
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
            'Kode Departemen',
            'Departemen',
            'Kontrak',
            'Jabatan',
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
