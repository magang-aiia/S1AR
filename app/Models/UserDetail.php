<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kontrak;
use App\Models\Departemen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;

    protected $guarded=
    [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function kontrak()
    {
        return $this->belongsTo(Kontrak::class);
    }
}
