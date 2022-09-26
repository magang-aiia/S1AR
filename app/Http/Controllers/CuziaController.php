<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Kontrak;
use App\Models\Departemen;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Gate;

class CuziaController extends Controller
{
    public function datadiri_user()
    {
        return Inertia::render('User/Datadiri', [
            'isAtasan' => Gate::allows('isAtasan'),
            'karyawan' => UserDetail::where('user_id', auth()->user()->id)->with(['user', 'kontrak'])->first(),
            'kontrak' => Kontrak::all(),
            'jabatan' => Jabatan::with('bagian')->get(),
        ]);
    }

    public function ajukan_datadiri(Request $request)
    {
        dd($request->all());
    }
}
