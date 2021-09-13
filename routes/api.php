<?php

use App\Http\Controllers\apotek\ObatConntroller;
use App\Http\Controllers\apotek\ObatController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\pendaftaran\PasienController as PendaftaranPasienController;
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
Route::post('/register', [AuthController::class, "register"]);
Route::post('/login', [AuthController::class, "login"]);
Route::get('/user', [AuthController::class, "user"]);
Route::get('/logout', [AuthController::class, "logout"]);

Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AuthController::class, "user"]);
});

Route::middleware(['auth', 'pendaftaran'])->group(function () {
    Route::get('pendaftaran/dashboard', [AuthController::class, "user"]);
    Route::resource('pendaftaran/pasien',PendaftaranPasienController::class);
});

Route::middleware(['auth', 'apotek'])->group(function () {
    Route::get('apotek/dashboard', [AuthController::class, "user"]);
    Route::resource('apotek/obat', ObatController::class);
    Route::put('apotek/obat/{id}/updatestok', [ObatController::class,"updateStok"]);
});

Route::middleware(['auth', 'medis'])->group(function () {
    Route::get('medis/dashboard', [AuthController::class, "user"]);
});

Route::middleware(['auth', 'kasir'])->group(function () {
    Route::get('admin/dashboard', [AuthController::class, "user"]);
});

Route::middleware(['auth', 'kepala_kasir'])->group(function () {
    Route::get('kepala_kasir/dashboard', [AuthController::class, "user"]);
});

Route::middleware(['auth', 'kepala_apotek'])->group(function () {
    Route::get('kepala_apotek/dashboard', [AuthController::class, "user"]);
});
