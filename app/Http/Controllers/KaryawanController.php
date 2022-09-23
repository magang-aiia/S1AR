<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Kontrak;
use App\Models\Departemen;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Exports\KaryawanExport;
use App\Imports\KaryawanImport;
use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\LevelUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class KaryawanController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Karyawan', [
            'karyawan' => UserDetail::with(['user', 'kontrak'])->get(),
            'jabatan' => Jabatan::with('bagian')->get(),
            'kontrak' => Kontrak::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama' => 'required',
            'email' => 'required|unique:users',
            'npk' => 'required|unique:users',
            'jabatan_id' => 'required',
            'bagian_id' => 'required',
            'kontrak_id' => 'required',
            'tgl_bergabung' => 'required',
            'no_hp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'gol' => 'required',
            'sta_kerja' => 'required',
            'sta_nikah' => 'required',
            'sta_pajak' => 'required',
            'no_bpjs_tk' => 'required',
            'no_bpjs_kes' => 'required',
            'no_dpa' => 'required',
            'no_npwp' => 'required',
            'no_ktp' => 'required|numeric',
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
            'bagian_id' => $request->bagian_id,
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = $user->npk . '-' . time() . '.' . $ext;
            $file->storeAs('public/image/', $filename);
            $user->avatar = $filename;
            $user->save();
        }

        UserDetail::create([
            'user_id' => $user->id,
            'kontrak_id' => $request->kontrak_id,
            'tgl_bergabung' => $request->tgl_bergabung,
            'no_hp' => $request->no_hp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
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

        $user_detail = UserDetail::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $user_detail->user_id,
            'npk' => 'required|unique:users,npk,' . $user_detail->user_id,
            'jabatan_id' => 'required',
            'bagian_id' => 'required',
            'kontrak_id' => 'required',
            'tgl_bergabung' => 'required',
            'no_hp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
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

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            if ($user_detail->user->avatar != 'avatar.jpg') {
                Storage::delete('public/image/' . $user_detail->user->avatar);
            }
            $ext = $file->getClientOriginalExtension();
            $filename = $user_detail->user->npk . '-' . time() . '.' . $ext;
            $file->storeAs('public/image/', $filename);
            $user_detail->user->avatar = $filename;
        }

        $user_detail->user->name = $request->nama;
        $user_detail->user->email = $request->email;
        $user_detail->user->npk = $request->npk;
        $user_detail->user->bagian_id = $request->bagian_id;

        $user_detail->kontrak_id = $request->kontrak_id;
        $user_detail->tgl_bergabung = $request->tgl_bergabung;
        $user_detail->no_hp = $request->no_hp;
        $user_detail->tmp_lahir = $request->tmp_lahir;
        $user_detail->tgl_lahir = $request->tgl_lahir;
        $user_detail->gol = $request->gol;
        $user_detail->sta_kerja = $request->sta_kerja;
        $user_detail->sta_nikah = $request->sta_nikah;
        $user_detail->sta_pajak = $request->sta_pajak;
        $user_detail->no_bpjs_tk = $request->no_bpjs_tk;
        $user_detail->no_bpjs_kes = $request->no_bpjs_kes;
        $user_detail->no_dpa = $request->no_dpa;
        $user_detail->no_npwp = $request->no_npwp;
        $user_detail->no_ktp = $request->no_ktp;
        $user_detail->alamat_dom = $request->alamat_dom;
        $user_detail->alamat_ktp = $request->alamat_ktp;
        $user_detail->nama_istri = $request->nama_istri;
        $user_detail->jml_anak = $request->jml_anak;
        $user_detail->nama_anak1 = $request->nama_anak1;
        $user_detail->nama_anak2 = $request->nama_anak2;
        $user_detail->nama_anak3 = $request->nama_anak3;
        $user_detail->status = $request->status;

        $user_detail->user->save();
        $user_detail->save();

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

        Excel::import(new KaryawanImport($request->replace), $request->file('excel'));

        if ($request->has('foto') && $request->foto != null) {
            $zip = new ZipArchive;
            $zip->open($request->file('foto'), ZipArchive::CREATE);
            $zip->extractTo(storage_path('app/public/dump_image'));
            $zip->close();
            $list_file = array_diff(scandir(storage_path('app/public/dump_image')), array('..', '.'));

            foreach ($list_file as $file) {
                $plot = explode('.', $file);
                $npk = $plot[0];
                $ext = end($plot);
                $user = User::where('npk', $npk)->first();
                if ($user != null) {
                    if ($user->avatar != 'avatar.jpg') {
                        Storage::delete('public/image/' . $user->avatar);
                    }

                    $file_name =  $npk . '-' . time() . '.' . $ext;

                    $user->avatar = $file_name;
                    $user->save();

                    $avatar_exist = File::glob(storage_path('app/public/image/' . $npk . '*'));
                    File::delete($avatar_exist);

                    Storage::move('public/dump_image/' . $file, 'public/image/' . $file_name);
                }
            }
            Storage::deleteDirectory('public/dump_image');
        }

        if ($request->has('replace') && $request->replace == 1) {
            return Redirect::route('admin.karyawan')->with('success', 'Data berhasil diimport dan menggantikan data lama');
        } else {
            return Redirect::route('admin.karyawan')->with('success', 'Data berhasil diimport');
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::route('admin.karyawan')->with('success', 'Data berhasil dihapus');
    }
}
