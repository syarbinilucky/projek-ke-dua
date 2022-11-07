<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\mahasiswa;
use App\Http\Controllers\MahasiswaController;
use App\Models\mahasiswa as ModelsMahasiswa;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home',[HomeController::class,'home']);
Route::get('/mahasiswa',[MahasiswaController::class,'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/form-tambah',[MahasiswaController::class,'tambahmahasiswa'])->name('mahasiswa.tambah');
Route::post('/mahasiswa/form-tambah/post',[MahasiswaController::class,'insertdata'])->name('mahasiswa.insert');
Route::get('/tampilkandata/{id}',[MahasiswaController::class,'tampilkandata'])->name('tampilkandata');
Route::put('/updatedata/{id}',[MahasiswaController::class,'updatedata'])->name('updatedata');
Route::get('/delete/{id}',[MahasiswaController::class,'delete'])->name('delete');
// eksport pdf
Route::get('/exportpdf',[MahasiswaController::class,'exportpdf'])->name('exportpdf');
Route::get('/exportexcel',[MahasiswaController::class,'exportexcel'])->name('exportexcel');
Route::post('/importexcel',[MahasiswaController::class,'importexcel'])->name('importexcel');

