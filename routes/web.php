<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\TestimoniController;

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

Auth::routes();
Route::get('/', [HomeController::class,'welcome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('siswa', SiswaController::class);
Route::post('siswa-import', [SiswaController::class,'import_excel'])->name('import');
Route::get('siswa-angkatan/{id}', [SiswaController::class,'periode'])->name('periode');
Route::resource('angkatan', TahunController::class);
Route::get('/hapus-angkatan/{id}',[TahunController::class,'hapus'])->name('hapus.angkatan');
Route::resource('testimoni', TestimoniController::class)->except([
    'create', 'edit', 'update', 'destroy'
]);
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Clear Config cleared</h1>';
});