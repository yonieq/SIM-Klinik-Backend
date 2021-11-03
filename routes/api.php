<?php

use App\Http\Controllers\administrasi\DashboardController as AdministrasiDashboardController;
use App\Http\Controllers\administrasi\DokterController;
use App\Http\Controllers\administrasi\JadwalDokterController;
use App\Http\Controllers\administrasi\PegawaiController;
use App\Http\Controllers\administrasi\PoliklinikController;
use App\Http\Controllers\administrator\PoliklinikController as AdministratorPoliklinikController;
use App\Http\Controllers\apotek\DashboardController as ApotekDashboardController;
use App\Http\Controllers\apotek\ObatConntroller;
use App\Http\Controllers\apotek\ObatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dokter\DashboardController as DokterDashboardController;
use App\Http\Controllers\dokter\Report_pemeriksaanController;
use App\Http\Controllers\dokter\Rujukan_rsLainController;
use App\Http\Controllers\kasir\DashboardController as KasirDashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\pendaftaran\AntrianController;
use App\Http\Controllers\pendaftaran\DashboardController;
use App\Http\Controllers\pendaftaran\Data_pasienController;
use App\Http\Controllers\pendaftaran\Pasien_baruController;
use App\Http\Controllers\pendaftaran\Pasien_lamaController;
use App\Http\Controllers\pendaftaran\PasienController as PendaftaranPasienController;
use App\Models\Antrian;
use Illuminate\Foundation\Console\PolicyMakeCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('/register', [AuthController::class, "register"]);
Route::post('/login', [AuthController::class, "login"]);
Route::get('/user', [AuthController::class, "user"]);
Route::get('/logout', [AuthController::class, "logout"]);
Route::resource('admin/poliklinik', AdministratorPoliklinikController::class);

// Route::middleware(['JWTAut', 'admin'])->group(function () {
//     Route::get('admin/dashboard', [AuthController::class, "user"]);
//     Route::resource('admin/poliklinik', PoliklinikController::class);
//     Route::resource('admin/pegawai', PegawaiController::class);
//     Route::resource('admin/dokter', DokterController::class);
//     Route::resource('admin/jadwaldokter', JadwalDokterController::class);
//     Route::get('admin/jadwaldokter/listdokter/{id}', [JadwalDokterController::class,"getDokter"]);
// });
// Route::middleware(['JWTAut', 'admin'])->group(function () {
    Route::resource('administrasi/dashboard', AdministrasiDashboardController::class);
// });

// Route::middleware(['JWTAut','pendaftaran'])->group(function () {
//     Route::get('pendaftaran/dashboard', [AuthController::class, "user"]);
    Route::resource('pendaftaran/data_pasien',Data_pasienController::class);
    Route::post('pendaftaran/data_pasien/filter_tanggal',[Data_pasienController::class,"filter_tanggal"]);
    Route::resource('pendaftaran/dashboard',DashboardController::class);
    Route::resource('pendaftaran/pasien_baru',Pasien_baruController::class);
    Route::resource('pendaftaran/pasien_lama',Pasien_lamaController::class);
//     Route::resource('pendaftaran/antrian', AntrianController::class);
    Route::get('pendaftaran/listdokter/{tanggal}/{poli}', [Pasien_baruController::class,"getDokter"]);
// });

// Route::middleware(['JWTAut', 'apotek'])->group(function () {
    Route::resource('apotek/dashboard', ApotekDashboardController::class);
    Route::get('apotek/dashboard/{dashboard}/cetak', [ApotekDashboardController::class,'cetak']);
//     Route::resource('apotek/obat', ObatController::class);
//     Route::put('apotek/obat/{id}/updatestok', [ObatController::class,"updateStok"]);
// });

// Route::middleware(['JWTAut', 'dokter'])->group(function () {
    Route::resource('dokter/dashboard',DokterDashboardController::class);
    Route::resource('dokter/rujukan',Rujukan_rsLainController::class);
    Route::resource('dokter/report_pemeriksaan',Report_pemeriksaanController::class);
    Route::get('dokter/dashboard/{dashboard}/batal',[DokterDashboardController::class,"batal"]);
    //     Route::get('medis/dashboard', [AuthController::class, "user"]);
// });

// Route::middleware(['JWTAut', 'kasir'])->group(function () {
    Route::resource('kasir/dashboard', KasirDashboardController::class);
// });

// Route::middleware(['JWTAut', 'kepala_kasir'])->group(function () {
//     Route::get('kepala_kasir/dashboard', [AuthController::class, "user"]);
// });

// Route::middleware(['JWTAut', 'kepala_apotek'])->group(function () {
//     Route::get('kepala_apotek/dashboard', [AuthController::class, "user"]);
// });
