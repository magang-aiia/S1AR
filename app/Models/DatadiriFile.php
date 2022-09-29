<?php

namespace App\Models;

use App\Models\PengajuanDatadiri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatadiriFile extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanDatadiri::class, 'kode_pengajuan', 'kode');
    }
}
