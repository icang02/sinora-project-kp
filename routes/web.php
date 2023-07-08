<?php

use App\Http\Controllers\AuthAbsenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\JenisRapatController;
use App\Http\Controllers\ManajemenUserController;
use App\Http\Controllers\NotulenController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RapatController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/seed', function () {
//     return Artisan::call('migrate:fresh --seed');
// });

Route::get('/', function () {
    return view('dashboard.admin.index', [
        'title' => 'Dashboard',
    ]);
})->name('dashboard')->middleware('auth');

Route::get('/profil', [ProfilController::class, 'index'])->name('profil')->middleware('auth');
Route::put('/update-profil/{user}', [ProfilController::class, 'updateProfil'])->name('update.profil')->middleware('auth');
Route::put('/change-password/{user}', [ProfilController::class, 'changePassword'])->name('change.password')->middleware('auth');

// ROUTE HALAMAN ADMINISTRATOR
Route::get('/manajemen-user', [ManajemenUserController::class, 'index'])->name('manajemen.user')->middleware(['auth', 'can:admin']);
Route::post('/add-user', [ManajemenUserController::class, 'addUser'])->name('add.user');
Route::delete('/delete-user/{id}', [ManajemenUserController::class, 'deleteUser'])->name('delete.user');
Route::put('/update-user/{id}', [ManajemenUserController::class, 'updateUser'])->name('update.user');
Route::get('/reset/{user}', [ManajemenUserController::class, 'reset'])->name('reset');

Route::get('/jenis-rapat', [JenisRapatController::class, 'index'])->name('jenis.rapat')->middleware(['auth', 'can:admin']);
Route::post('/add-jenis-rapat', [JenisRapatController::class, 'addJenisRapat'])->name('add.jenis.rapat');
Route::delete('/delete-jenis-rapat/{id}', [JenisRapatController::class, 'deleteJenisRapat'])->name('delete.jenis.rapat');
Route::put('/update-jenis-rapat/{id}', [JenisRapatController::class, 'updateJenisRapat'])->name('update.jenis.rapat');

Route::get('/data-rapat/{rapat:status?}', [RapatController::class, 'index'])->name('rapat')->middleware('auth');
Route::get('/rapat/{rapat:slug}', [RapatController::class, 'detailRapat'])->name('detail.rapat')->middleware('auth');
Route::post('/add-rapat', [RapatController::class, 'addRapat'])->name('add.rapat');
Route::put('/update-rapat/{rapat:slug}', [RapatController::class, 'updateRapat'])->name('update.rapat');
Route::delete('/delete-rapat/{rapat:slug}', [RapatController::class, 'deleteRapat'])->name('delete.rapat');
// BATAS RAPAT

Route::post('/add-peserta', [PesertaController::class, 'addPeserta'])->name('add.peserta');
Route::delete('/delete-peserta/{peserta}', [PesertaController::class, 'deletePeserta'])->name('delete.peserta');

Route::get('/dokumentasi/{rapat:slug}', [DokumentasiController::class, 'index'])->name('dokumentasi');
Route::post('/upload-dokumentasi/{rapatId}', [DokumentasiController::class, 'upload'])->name('upload.dokumentasi');
Route::delete('/delete-dokumentasi/{foto}', [DokumentasiController::class, 'delete'])->name('delete.dokumentasi');
// END ROUTE ADMINISTRATOR

// AUTHENTICATION
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ABSEN
Route::get('/absen', [AuthAbsenController::class, 'index'])->name('absen');
Route::post('/absen', [AuthAbsenController::class, 'processAbsen'])->name('process.absen');
Route::post('/upload-absen/{rapatId}', [AuthAbsenController::class, 'uploadAbsen'])->name('upload.absen');
Route::get('/download-absen/{id}', [AuthAbsenController::class, 'downloadAbsen'])->name('download.absen');

Route::get('/notulen', [NotulenController::class, 'index'])->name('notulen');
Route::get('/notulen/{rapat:kode}', [NotulenController::class, 'indexNotulen'])->name('isi.notulen');
Route::post('/notulen/{notulen}', [NotulenController::class, 'saveNotulen'])->name('save.notulen');
Route::post('/notulen', [NotulenController::class, 'checkKode'])->name('check.kode');
Route::post('/notulen-logout', [NotulenController::class, 'notulenLogout'])->name('notulen.logout');
Route::post('/akhiri-rapat', [NotulenController::class, 'akhiriRapat'])->name('akhiri.rapat');

Route::get('/notulen/edit/{id}', [NotulenController::class, 'editNotulen'])->name('edit.notulen')->middleware(['auth', 'can:pegawai']);
Route::put('/notulen/update/{notulen}', [NotulenController::class, 'updateNotulen'])->name('update.notulen')->middleware(['auth', 'can:pegawai']);

Route::get('/lihat-notulen/{id}', [NotulenController::class, 'viewPdf'])->name('lihat.notulen');
Route::get('/lihat-notulen/unduh/{id}', [NotulenController::class, 'viewPdf'])->name('download.notulen');
// Route::get('/downlad-notulen/{id}', [NotulenController::class, 'download'])->name('download.notulen');


// TEMPLATE PRINT DAFTAR HADIR
Route::get('/print-absen/{rapat}', [AuthAbsenController::class, 'printAbsen'])->name('print.absen');
