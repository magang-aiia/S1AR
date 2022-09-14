<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MadingController;
use App\Http\Controllers\RoleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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
// route::get('/admin/dashboard', [RoleController::class, 'index']);
// route::get('/admin/datadiri', [RoleController::class, 'admin_datadiri']);


Route::get('/', function () {
    return redirect()->route('login');
})->name('root');

Route::get('/dashboard', function () {
    return Inertia::render('User/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/datadiri', function () {
    return Inertia::render('User/Datadiri');
})->middleware(['auth', 'verified'])->name('datadiri');

Route::get('/cuti', function () {
    return Inertia::render('User/Cuti');
})->middleware(['auth', 'verified'])->name('cuti');

Route::get('/izin', function () {
    return Inertia::render('User/Izin');
})->middleware(['auth', 'verified'])->name('izin');

Route::get('/history', function () {
    return Inertia::render('User/History');
})->middleware(['auth', 'verified'])->name('history');

Route::get('/absensi', function () {
    return Inertia::render('User/Absensi');
})->middleware(['auth', 'verified'])->name('absensi');

Route::get('/notification', function () {
    return Inertia::render('Notification');
})->middleware(['auth', 'verified'])->name('notification');

Route::get('/approval', function () {
    return Inertia::render('User/Approval');
})->middleware(['auth', 'verified'])->name('approval');

Route::middleware(['auth', 'verified', 'role:hrd'])->prefix('admin')->group(function () {

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
    
        Route::get('/cuzia', function () {
            return Inertia::render('Admin/Cuzia');
        })->name('admin.cuzia');
    
        Route::get('/pengajuan', function () {
            return Inertia::render('Admin/Pengajuan');
        })->name('admin.pengajuan');
    
        Route::get('/absensi', function () {
            return Inertia::render('Admin/Absensi');
        })->name('admin.absensi');
    
        Route::get('/karyawan', function () {
            return Inertia::render('Admin/Karyawan');  
        return Inertia::render('Admin/Karyawan');
            return Inertia::render('Admin/Karyawan');  
        })->name('admin.karyawan');

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





// Route::resource('roles', RoleController::class);
// Route::controller(RoleController::class)->group(function()
// {
//     Route::get('/roles', 'index')->middleware('can:read');

// });
