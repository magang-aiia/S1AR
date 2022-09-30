<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Jabatan;
use App\Models\Kontrak;
use Illuminate\Http\Request;
use App\Models\PengajuanDatadiri;
use App\Http\Controllers\Controller;
use App\Models\RejectedDatadiri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class ApprovalController extends Controller
{
    public function history()
    {
        $pengajuan_datadiri = PengajuanDatadiri::where('user_id', Auth::user()->id)
            ->with('user', 'kontrak', 'approval1', 'approval2', 'rejected', 'file')
            ->get();
            
        return Inertia::render('User/History', [
            'isAtasan' => Gate::allows('isAtasan'),
            'pengajuanDatadiri' => $pengajuan_datadiri,
            'kontrak' => Kontrak::all(),
            'jabatan' => Jabatan::with('bagian')->get(),
        ]);
    }

    public function approval()
    {
        $pengajuanDatadiri = PengajuanDatadiri::where('approval1_id', Auth::user()->id)
            ->orWhere('approval2_id', Auth::user()->id)
            ->with('user', 'kontrak', 'approval1', 'approval2', 'rejected', 'file')
            ->get();
            
        return Inertia::render('User/Approval', [
            'pengajuanDatadiri' => $pengajuanDatadiri,
            'kontrak' => Kontrak::all(),
            'jabatan' => Jabatan::with('bagian')->get(),
        ]);
    }

    public function approve(Request $request)
    {
        if ($request->has('id')) {
            $pengajuanDatadiri = PengajuanDatadiri::find($request->id);
            if (Gate::allows('isAdmin')) {
                $pengajuanDatadiri->hr_confirm = 'approved';
                $pengajuanDatadiri->save();
            } else {
                if ($pengajuanDatadiri->approval1_id == Auth::user()->id) {
                    $pengajuanDatadiri->approval1_status = 'approved';
                    $pengajuanDatadiri->save();
                } else if ($pengajuanDatadiri->approval2_id == Auth::user()->id) {
                    $pengajuanDatadiri->approval2_status = 'approved';
                    $pengajuanDatadiri->save();
                }
            }
        }

        return CuziaController::cekOrUpdateDatadiri($pengajuanDatadiri->kode);
    }

    public function rejected(Request $request)
    {
        if ($request->has('id')) {
            $pengajuanDatadiri = PengajuanDatadiri::find($request->id);
            if (Gate::allows('isAdmin')) {
                $pengajuanDatadiri->hr_confirm = 'rejected';
                $pengajuanDatadiri->save();
            } else {
                if ($pengajuanDatadiri->approval1_id == Auth::user()->id) {
                    $pengajuanDatadiri->approval1_status = 'rejected';
                    $pengajuanDatadiri->save();
                } else if ($pengajuanDatadiri->approval2_id == Auth::user()->id) {
                    $pengajuanDatadiri->approval2_status = 'rejected';
                    $pengajuanDatadiri->save();
                }
            }

            RejectedDatadiri::create([
                'pengajuan_datadiri_id' => $pengajuanDatadiri->id,
                'user_id' => Auth::user()->id,
                'keterangan' => $request->has('ket') ? $request->ket : '-'
            ]);
        }

        if (Gate::allows('isAdmin')) return Redirect::route('admin.cuzia');
        return Redirect::route('approval');
    }
}
