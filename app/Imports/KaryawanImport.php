<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class KaryawanImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            User::create([
                'name' => $row[0],
                'email' => $row[1],
                'npk' => $row[2],
                'password' => Hash::make('password'),
            ]);
            
        }
    }
}
