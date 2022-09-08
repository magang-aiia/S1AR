<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Kontrak;
use App\Models\Departemen;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class KaryawanController extends Controller
{
    public function index()
    {
        return inertia('Admin/Karyawan', [
            'karyawan' => UserDetail::with(['user', 'departemen', 'kontrak'])->get(),
            'departemen' => Departemen::all(),
            'kontrak' => Kontrak::all(),
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'npk' => 'required',
            'departemen_id' => 'required',
            'kontrak_id' => 'required',
            'tgl_bergabung' => 'required',
            'no_hp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jabatan' => 'required',
            'gol' => 'required',
            'sta_kerja' => 'required',
            'sta_nikah' => 'required',
            'sta_pajak' => 'required',
            'no_bpjs_tk' => 'required',
            'no_bpjs_kes' => 'required',
            'no_dpa' => 'required',
            'no_npwp' => 'required',
            'no_ktp' => 'required',
            'alamat_dom' => 'required',
            'alamat_ktp' => 'required',
            'nama_istri' => 'string',
            'jml_anak' => 'numeric',
            'nama_anak1' => 'string',
            'nama_anak2' => 'string',
            'nama_anak3' => 'string',
            'status' => 'required',
        ]);

        $user = UserDetail::find($id);
        $user->user->name = $request->nama;
        $user->user->email = $request->email;
        $user->user->npk = $request->npk;
        
        $user->departemen_id = $request->departemen_id;
        $user->kontrak_id = $request->kontrak_id;
        $user->tgl_bergabung = $request->tgl_bergabung;
        $user->no_hp = $request->no_hp;
        $user->tmp_lahir = $request->tmp_lahir;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->jabatan = $request->jabatan;
        $user->gol = $request->gol;
        $user->sta_kerja = $request->sta_kerja;
        $user->sta_nikah = $request->sta_nikah;
        $user->sta_pajak = $request->sta_pajak;
        $user->no_bpjs_tk = $request->no_bpjs_tk;
        $user->no_bpjs_kes = $request->no_bpjs_kes;
        $user->no_dpa = $request->no_dpa;
        $user->no_npwp = $request->no_npwp;
        $user->no_ktp = $request->no_ktp;
        $user->alamat_dom = $request->alamat_dom;
        $user->alamat_ktp = $request->alamat_ktp;
        $user->nama_istri = $request->nama_istri;
        $user->jml_anak = $request->jml_anak;
        $user->nama_anak1 = $request->nama_anak1;
        $user->nama_anak2 = $request->nama_anak2;
        $user->nama_anak3 = $request->nama_anak3;
        $user->status = $request->status;

        $user->user->save();
        $user->save();

        return Redirect::route('admin.karyawan')->with('success', 'Data berhasil diubah');
    }

    public function update_status($id)
    {
        $karyawan = UserDetail::where('user_id', $id)->first();
        $karyawan->status == 'aktif' ? $karyawan->status = 'nonaktif' : $karyawan->status = 'aktif';
        $karyawan->save();
        return Redirect::route('admin.karyawan');
    }

    public function aktif_status(Request $request)
    {
        $karyawan_list = $request->only('karyawan_list')['karyawan_list'];
        foreach ($karyawan_list as $user_id) {
            $karyawan = UserDetail::where('user_id', $user_id)->first();
            $karyawan->status = 'aktif';
            $karyawan->save();
        }
        return Redirect::route('admin.karyawan');
    }

    public function nonaktif_status(Request $request)
    {
        $karyawan_list = $request->only('karyawan_list')['karyawan_list'];
        foreach ($karyawan_list as $user_id) {
            $karyawan = UserDetail::where('user_id', $user_id)->first();
            $karyawan->status = 'nonaktif';
            $karyawan->save();
        }
        return Redirect::route('admin.karyawan');
    }
}
