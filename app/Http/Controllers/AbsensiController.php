<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Shift;
use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Exports\AbsensiExport;
use App\Imports\AbsensiImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;

class AbsensiController extends Controller
{
    private $date;
    private $month;
    private $year;

    public function __construct() {
        $this->date = date('Y-m-d');
        $this->month = date('m');
        $this->year = date('Y');
    }
    
    public function admin_index(Request $request)
    {
        if ($request->has('date')) {
            $this->date = $request->date;
        }
        return Inertia::render('Admin/Absensi', [
            'absensi' => Absensi::where('tanggal', $this->date)->with('user', 'shift')->get(),
            'date' => $this->date,
            'shift' => Shift::all()->pluck('nama')->toArray(),
            'status' => Absensi::get()->unique('status')->pluck('status')->toArray(),
        ]);
    }

    public function user_index(Request $request) {
        return Inertia::render('User/Absensi', [
            'isAtasan' => Gate::allows('isAtasan'),
        ]);
    }

    public function export(Request $request)
    {
        $tglfrom = $request->tglfrom;
        $tglto = $request->tglto;
        return Excel::download(new AbsensiExport($tglfrom, $tglto), 'absensi.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx,xls',
            'replace' => 'required|boolean'
        ]);
        
        $replace = $request->replace;
        Excel::import(new AbsensiImport($replace), $request->file('excel'));

        if ($request->has('replace') && $request->replace == 1) {
            return Redirect::route('admin.absensi')->with('success', 'Data berhasil diimport dan menggantikan data lama');
        } else {
            return Redirect::route('admin.absensi')->with('success', 'Data berhasil diimport');
        }
    }
}
