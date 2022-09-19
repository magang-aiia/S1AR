<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'npk',
        'email',
        'password',
        'jabatan_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mading()
    {
        return $this->hasMany(Mading::class);
    }

    public function user_detail()
    {
        return $this->hasOne(UserDetail::class)->with('departemen', 'kontrak', 'jabatan');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class)->with('level_user', 'atasan_atasan');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class)->with('shift');
    }
}
