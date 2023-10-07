<?php

use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminKomentarController;
use App\Http\Controllers\AdminPengaduanController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListPengaduanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PengaduanSayaController;
use App\Models\Pengaduan;

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

Route::get('/', [BerandaController::class, 'index']);
Route::get('/tambah-aduan', [PengaduanController::class, 'index']);
Route::post('/tambah-aduan', [PengaduanController::class, 'tambahAduan']);
Route::get('/tambah-aduan/slug', [PengaduanController::class, 'slug']);

Route::get('/lihat-aduan', [ListPengaduanController::class, 'index']);
Route::get('/lihat-aduan/{pengajuan:slug}', [ListPengaduanController::class, 'detail']);

Route::post('/lihat-aduan/{slug}', [CommentController::class, 'comment']);
Route::post('/lihat-aduan/{slug}/reply', [CommentController::class, 'commentReply']);

Route::get('/aduan-saya', [PengaduanSayaController::class,'index']);

Auth::routes();
Route::middleware('auth')->group(function(){
    Route::group(['middleware' => 'CheckRole:admin'], function(){
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

        Route::get('/admin/pengaduan', [AdminPengaduanController::class, 'index']);
        Route::get('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'show']);
        Route::get('/admin/pengaduan/{id}/edit', [AdminPengaduanController::class, 'edit']);
        Route::put('/admin/pengaduan/{id}', [AdminPengaduanController::class, 'update']);

        Route::get('/admin/komentar', [AdminKomentarController::class, 'index']);

        Route::resource('/admin/kategori', AdminKategoriController::class);
    });
});