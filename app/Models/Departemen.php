<?php

namespace App\Models;

use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departemen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function userDetail()
    {
        return $this->hasMany(UserDetail::class);
    }
}
