<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\MadingController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\CuziaController;
use App\Http\Controllers\KaryawanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('root');

Route::middleware(['auth', 'verified', 'can:isUser'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('User/Dashboard', [
            'isAtasan' => Gate::allows('isAtasan'),
        ]);
    })->name('dashboard');

    Route::get('/datadiri', [CuziaController::class, 'datadiri_user'])->name('datadiri');
    Route::post('/datadiri', [CuziaController::class, 'ajukan_datadiri'])->name('ajukan.datadiri');

    Route::get('/cuti', function () {
        return Inertia::render('User/Cuti', [
            'isAtasan' => Gate::allows('isAtasan'),
        ]);
    })->name('cuti');

    Route::get('/izin', function () {
        return Inertia::render('User/Izin', [
            'isAtasan' => Gate::allows('isAtasan'),
        ]);
    })->name('izin');

    Route::get('/history', [ApprovalController::class, 'history'])->name('history');

    Route::get('/absensi', [AbsensiController::class, 'user_index'])->name('absensi');

    Route::get('/approval', [ApprovalController::class, 'approval'])->middleware('can:isAdminOrAtasan')->name('approval');
});

Route::post('/approval', [ApprovalController::class, 'approve'])->middleware(['auth', 'verified','can:isAdminOrAtasan'])->name('approve');
Route::post('/reject', [ApprovalController::class, 'rejected'])->middleware(['auth', 'verified','can:isAdminOrAtasan'])->name('rejected');

Route::post('/change_password', [KaryawanController::class, 'change_password'])->middleware(['auth', 'verified'])->name('change_password');

Route::get('/notification', function () {
    return Inertia::render('Notification', [
        'isAtasan' => Gate::allows('isAtasan'),
        'isAdmin' => Gate::allows('isAdmin'),
    ]);
})->middleware(['auth', 'verified'])->name('notification');

Route::middleware(['auth', 'verified', 'can:isAdmin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    Route::get('/datadiri', function () {
        return Inertia::render('Admin/Datadiri');
    })->name('admin.datadiri');

    Route::get('/cuti', function () {
        return Inertia::render('Admin/Cuti');
    })->name('admin.cuti');

    Route::get('/izin', function () {
        return Inertia::render('Admin/Izin');
    })->name('admin.izin');

    Route::get('/cuzia', [CuziaController::class, 'index_admin'])->name('admin.cuzia');

    Route::get('/pengajuan', function () {
        return Inertia::render('Admin/Pengajuan');
    })->name('admin.pengajuan');

    Route::get('absensi', [AbsensiController::class, 'admin_index'])->name('admin.absensi');
    Route::get('absensi/export', [AbsensiController::class, 'export'])->name('admin.absensi.export');
    Route::post('absensi/import', [AbsensiController::class, 'import'])->name('admin.absensi.import');

    Route::get('karyawan', [KaryawanController::class, 'index'])->name('admin.karyawan');
    Route::post('karyawan', [KaryawanController::class, 'store'])->name('admin.karyawan.store');
    Route::post('karyawan/{id}/update_status', [KaryawanController::class, 'update_status'])->name('admin.karyawan.update_status');
    Route::post('karyawan/aktif_status', [KaryawanController::class, 'aktif_status'])->name('admin.karyawan.aktif_status');
    Route::post('karyawan/nonaktif_status', [KaryawanController::class, 'nonaktif_status'])->name('admin.karyawan.nonaktif_status');
    Route::post('karyawan/{id}/update', [KaryawanController::class, 'update'])->name('admin.karyawan.update');
    Route::get('karyawan/export', [KaryawanController::class, 'export'])->name('admin.karyawan.export');
    Route::post('karyawan/import', [KaryawanController::class, 'import'])->name('admin.karyawan.import');
});



require __DIR__ . '/auth.php';
