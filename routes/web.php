<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Kelas\KelasController;
use App\Http\Controllers\KopetensiController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// route belum login
Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::resource('login', LoginController::class);

// route sudah login
Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('user', UserController::class);
   // Route::get('/rekayasa_perangkat_lunak/data_siswa/kelas/{id_kelas}', [KelasController::class, 'show'])->name('kelas.show');
    //Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    //Route::get('/data/xira', function () { return view('data.xira'); })->name('xira.index');
    Route::get('/data/xira', [KelasController::class, 'xira'])->name('kelas.xira');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');

    Route::get("/kopetensis", [KopetensiController::class, "index"])->name("kopetensis");
    Route::post("/kopetensis", [KopetensiController::class, "store"])->name("kopetensis.store");
    Route::put("/kopetensis/{kopetensi}", [KopetensiController::class, "update"])->name("kopetensis.update");
    Route::delete("/kopetensis/{kopetensi}", [KopetensiController::class, "destroy"])->name("kopetensis.destroy");
});



