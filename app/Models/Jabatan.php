<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function level_user()
    {
        return $this->belongsTo(LevelUser::class);
    }

    public function bawahan()
    {
        return $this->hasMany(Jabatan::class, 'atasan_kode', 'kode')->with('user');
    }

    public function atasan()
    {
        return $this->belongsTo(Jabatan::class, 'atasan_kode', 'kode')->with('user');
    }

    public function atasan_atasan()
    {
        return $this->belongsTo(Jabatan::class, 'atasan_kode', 'kode')->with('user', 'atasan');
    }
}
