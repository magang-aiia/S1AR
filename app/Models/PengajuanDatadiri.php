<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kontrak;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengajuanDatadiri extends Model
{
    use HasFactory;

    protected $guarded =
    [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->with('bagian');
    }

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class);
    }

    public function approval1()
    {
        return $this->belongsTo(User::class, 'approval1_id');
    }

    public function approval2()
    {
        return $this->belongsTo(User::class, 'approval2_id');
    }

    public function file()
    {
        return $this->hasMany(DatadiriFile::class, 'kode_pengajuan', 'kode');
    }

    public function rejected()
    {
        return $this->hasMany(RejectedDatadiri::class)->with('user');
    }
}
