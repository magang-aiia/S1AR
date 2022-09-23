<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function bawahan()
    {
        return $this->hasMany(Bagian::class, 'atasan_kode', 'kode')->with('user');
    }

    public function atasan()
    {
        return $this->belongsTo(Bagian::class, 'atasan_kode', 'kode')->with('user');
    }

    public function atasan_atasan()
    {
        return $this->belongsTo(Bagian::class, 'atasan_kode', 'kode')->with('user', 'atasan');
    }
}
