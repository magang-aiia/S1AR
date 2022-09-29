<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Jabatan;
use App\Models\Kontrak;
use App\Models\Departemen;
use App\Models\UserDetail;
use App\Models\DatadiriFile;
use Illuminate\Http\Request;
use App\Models\PengajuanDatadiri;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CuziaController extends Controller
{
    private $date;
    private $month;
    private $year;

    public function __construct()
    {
        $this->date = date('Y-m-d');
        $this->month = date('m');
        $this->year = date('Y');
    }

    public function index_admin(Request $request)
    {
        if ($request->has('date')) {
            $this->date = date('Y-m-d', strtotime($request->date));
            $this->month = date('m', strtotime($request->date));
            $this->year = date('Y', strtotime($request->date));
        }
        $pengajuanDatadiri =  PengajuanDatadiri::whereMonth('created_at', '=', $this->month)->whereYear('created_at', '=', $this->year)->with('user', 'kontrak', 'approval1', 'approval2', 'rejected')->get();
        return Inertia::render('Admin/Cuzia', [
            'pengajuanDatadiri' => $pengajuanDatadiri,
            'date' => $this->date,
            'range_tanggal' => PengajuanDatadiri::select(DB::raw('DATE_FORMAT(MIN(created_at), "%Y-%m-%d") as min, DATE_FORMAT(MAX(created_at), "%Y-%m-%d") as max'))->first(),
            'kontrak' => Kontrak::all(),
            'jabatan' => Jabatan::with('bagian')->get(),
        ]);
    }

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
        $user = Auth::user();
        $user_detail = $user->user_detail;
        $bagian = $user->bagian;
        $approval1 = null;
        $approval2 = null;
        $atasan = $bagian->atasan;
        $avatar = $user->avatar;
        $filenames = [];

        while (true) {
            if (count($atasan->user) > 0) {
                if ($approval1 == null) {
                    $approval1 = $atasan->user->first();
                } else {
                    $approval2 = $atasan->user->first();
                    break;
                }
                $atasan = $atasan->atasan;
            } else {
                $atasan = $atasan->atasan;
            }
        }

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'no_npwp' => 'required',
            'no_ktp' => 'required',
            'alamat_dom' => 'required',
            'alamat_ktp' => 'required',
            'nama_istri' => 'required|string',
            'jml_anak' => 'required|numeric',
            'nama_anak1' => 'required|string',
            'nama_anak2' => 'required|string',
            'nama_anak3' => 'required|string',
        ]);

        if ($user->avatar !== $request->avatar) {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = 'AV' . date('ymdHi') . trim($user->npk) . chr(rand(65, 90)) . chr(rand(65, 90)) . '.' . $ext;
            $file->storeAs('public/pengajuan/datadiri/avatar/', $filename);
            $avatar = $filename;
        }

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $allowedFile = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'jpg', 'jpeg', 'png', 'gif', 'txt', 'zip', 'rar', '7z'];
            foreach ($files as $file) {
                $ext = $file->getClientOriginalExtension();
                if (!in_array($ext, $allowedFile)) continue;
                $filename = 'FL' . date('ymdHi') . trim($user->npk) . chr(rand(65, 90)) . chr(rand(65, 90)) . '.' . $ext;
                $file->storeAs('public/pengajuan/datadiri/file/', $filename);
                $filenames[] = $filename;
            }
        }

        $pengajuan = PengajuanDatadiri::create([
            'user_id' => $user->id,
            'kode' => 'DD' . date('ymdHi') . trim($user->npk) . chr(rand(65, 90)) . chr(rand(65, 90)),
            'name' => $request->nama,
            'email' => $request->email,
            'npk' => $user->npk,
            'avatar' => $avatar,
            'no_hp' => $request->no_hp,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'tgl_bergabung' => $user_detail->tgl_bergabung,
            'kontrak_id' => $user_detail->kontrak_id,
            'gol' => $user_detail->gol,
            'sta_kerja' => $user_detail->sta_kerja,
            'sta_nikah' => $user_detail->sta_nikah,
            'sta_pajak' => $user_detail->sta_pajak,
            'no_bpjs_tk' => $user_detail->no_bpjs_tk,
            'no_bpjs_kes' => $user_detail->no_bpjs_kes,
            'no_dpa' => $user_detail->no_dpa,
            'no_npwp' => $request->no_npwp,
            'no_ktp' => $request->no_ktp,
            'alamat_dom' => $request->alamat_dom,
            'alamat_ktp' => $request->alamat_ktp,
            'nama_istri' => $request->nama_istri,
            'jml_anak' => $request->jml_anak,
            'nama_anak1' => $request->nama_anak1,
            'nama_anak2' => $request->nama_anak2,
            'nama_anak3' => $request->nama_anak3,
            'approval1_id' =>  $approval1 !== null ? $approval1->id : null,
            'approval2_id' =>  $approval2 !== null ? $approval2->id : null,
        ]);

        foreach ($filenames as $filename) {
            DatadiriFile::create([
                'kode_pengajuan' => $pengajuan->kode,
                'nama_file' => $filename,
            ]);
        }

        return redirect()->route('history')->with('success', 'Data berhasil diajukan');
    }
}
