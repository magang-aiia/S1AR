<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectedDatadiri extends Model
{
    use HasFactory;

    protected $guarded =
    [
        'id'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(PengajuanDatadiri::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
