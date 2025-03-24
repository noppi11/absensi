<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Kelas\KelasController;
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

    // CRUD Kopetensi
    Route::get('/kopetensi', [KelasController::class, 'indexKopetensi'])->name('kopetensi.index');
    Route::get('/kopetensi/create', [KelasController::class, 'createKopetensi'])->name('kopetensi.create');
    Route::post('/kopetensi', [KelasController::class, 'storeKopetensi'])->name('kopetensi.store');
    Route::get('/kopetensi/{kopetensi}/edit', [KelasController::class, 'editKopetensi'])->name('kopetensi.edit');
    Route::put('/kopetensi/{kopetensi}', [KelasController::class, 'updateKopetensi'])->name('kopetensi.update');
    Route::delete('/kopetensi/{kopetensi}', [KelasController::class, 'destroyKopetensi'])->name('kopetensi.destroy');


});



