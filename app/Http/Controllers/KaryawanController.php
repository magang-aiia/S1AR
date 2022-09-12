<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Kontrak;
use App\Models\Departemen;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Karyawan', [
            'karyawan' => UserDetail::with(['user', 'departemen', 'kontrak'])->get(),
            'departemen' => Departemen::all(),
            'kontrak' => Kontrak::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'email' => 'required|unique:users',
            'npk' => 'required|unique:users',
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
            'no_ktp' => 'required|numeric|digits:16',
            'alamat_dom' => 'required',
            'alamat_ktp' => 'required',
            'nama_istri' => 'required|string',
            'jml_anak' => 'required|numeric',
            'nama_anak1' => 'required|string',
            'nama_anak2' => 'required|string',
            'nama_anak3' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'npk' => $request->npk,
        ]);

        UserDetail::create([
            'user_id' => $user->id,
            'departemen_id' => $request->departemen_id,
            'kontrak_id' => $request->kontrak_id,
            'tgl_bergabung' => $request->tgl_bergabung,
            'no_hp' => $request->no_hp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jabatan' => $request->jabatan,
            'gol' => $request->gol,
            'sta_kerja' => $request->sta_kerja,
            'sta_nikah' => $request->sta_nikah,
            'sta_pajak' => $request->sta_pajak,
            'no_bpjs_tk' => $request->no_bpjs_tk,
            'no_bpjs_kes' => $request->no_bpjs_kes,
            'no_dpa' => $request->no_dpa,
            'no_npwp' => $request->no_npwp,
            'no_ktp' => $request->no_ktp,
            'alamat_dom' => $request->alamat_dom,
            'alamat_ktp' => $request->alamat_ktp,
            'nama_istri' => $request->nama_istri,
            'jml_anak' => $request->jml_anak,
            'nama_anak1' => $request->nama_anak1,
            'nama_anak2' => $request->nama_anak2,
            'nama_anak3' => $request->nama_anak3,
            'status' => 'aktif',
        ]);

        return Redirect::route('admin.karyawan')->with('success', 'Karyawan berhasil ditambahkan');
    }

    public function update($id, Request $request)
    {

        $user = UserDetail::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $user->user_id,
            'npk' => 'required|unique:users,npk,' . $user->user_id,
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
            'nama_istri' => 'required|string',
            'jml_anak' => 'required|numeric',
            'nama_anak1' => 'required|string',
            'nama_anak2' => 'required|string',
            'nama_anak3' => 'required|string',
            'status' => 'required',
        ]);

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

    public function export() 
    {
        return Excel::download(new KaryawanExport, 'data_karyawan.xlsx');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'excel' => 'required|mimes:xls,xlsx',
            'replace' => 'required|boolean'
        ]);

        Storage::putFileAs('public/image', $request->file('excel'), date('d-m-Y').'data_karyawan.xlsx');
        Excel::import(new KaryawanImport($request->replace), $request->file('excel'));

        return Redirect::route('admin.karyawan')->with('success', 'Data berhasil diimport');
    }
}
