<?php

use App\Http\Controllers\MadingController;
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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
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

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
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
});



require __DIR__ . '/auth.php';
